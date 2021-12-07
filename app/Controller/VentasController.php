<?php
App::uses('AppController', 'Controller');
/**
 * Ventas Controller
 *
 * @property Venta $Venta
 * @property PaginatorComponent $Paginator
 */
class VentasController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Venta->recursive = 0;
		$this->set('ventas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Venta->exists($id)) {
			throw new NotFoundException(__('Invalid venta'));
		}
		$options = array('conditions' => array('Venta.' . $this->Venta->primaryKey => $id));
		$this->set('venta', $this->Venta->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel("Producto");		
		if ($this->request->is('post')) {
			$this->Venta->create();
			$this->request->data['Venta']['fecha']=date('Y-m-d',strtotime($this->request->data['Venta']['fecha']));
			$TipoVta = $this->request->data['Venta']['tipoventa'];
			$numerodecomprobante = $this->Venta->find('first' , array ('fields' => array('MAX(Venta.numerocomprobante+1) as numerocomprobante'  )));
			$mynumeroComprobante = 1;
			if(isset($numerodecomprobante[0]['numerocomprobante'])){
				if(!is_null($numerodecomprobante[0]['numerocomprobante']))
					$mynumeroComprobante = $numerodecomprobante[0]['numerocomprobante'];
				
			}
			$this->request->data['Venta']['numerocomprobante']=$mynumeroComprobante;
			//	$this->request->data['Venta']['numerocomprobante']=$numerodecomprobante[0]['numerocomprobante'];
			$msg="";
			if ($this->Venta->saveAll($this->request->data)) {
				//$msg.='Venta registrada con exito.id: '.$detalle['producto_id'].' news'.$cantAnterior.'-'.$cantVendida.'='.$newstock;
				$msg.='Venta registrada con exito.';
				$this->Session->setFlash($msg);
				/*****************************************************/
				if ($TipoVta == 'venta')
				{
					foreach ($this->request->data['Detalleventa'] as $detalle) 
					{
						if (!$this->Producto->exists($detalle['producto_id'])) 
						{
							throw new NotFoundException(__('Producto Invalido'));
						}	
						$this->Producto->id = $detalle['producto_id'];

						$cantVendida =	 $detalle['cantidad'];
						$cantAnterior = $this->Producto->field('cantidad');
						$newstock =  $cantAnterior - $cantVendida;
												
						$this->Producto->id = $detalle['producto_id'];
						if($this->Producto->saveField('cantidad', $newstock)){
							$msg.='El detalle de la venta a sido registrado con exito:'.$cantAnterior.'-'.$cantVendida.'='.$newstock;
						}else{
							$msg.='El detalle de la venta NO a sido registrado con exito.id: '.$detalle['producto_id'].' news'.$cantAnterior.'-'.$cantVendida.'='.$newstock;
							$this->Session->setFlash($msg);
							return $this->redirect(array('action' => 'index'));
						}
					}
				}
				/*****************************************************/

				return $this->redirect(array('action' => 'index'));
			} else {
				$msg.='Venta no registrada. Intende de nuevo mas tarde'.$newstock;
				$this->Session->setFlash($msg);
				
			}
			$this->Session->setFlash($msg);
		}
		$clientes = $this->Venta->Cliente->find('list');
		//$ordentrabajos = $this->Venta->Ordentrabajo->find('list');
		

		$productos = $this->Producto->find('list',['order'=>'Producto.nombre']);		
		$productosprecios = $this->Producto->find('list', array('fields' =>array('id','precioventa')));
		$productosstock = $this->Producto->find('list', array('fields' =>array('id','cantidad')));
		$productosdescuentos =  $this->Producto->find('list', array('fields' =>array('id','porcdescuento')));
		$numerodecomprobante = $this->Venta->find('first' , array ('fields' => array('MAX(Venta.numerocomprobante+1) as numerocomprobante'  )));
		if(!isset($numerocomprobante[0]['numerocomprobante'])){
			$numerocomprobante[0]['numerocomprobante']=0;
		}
		$this->set('numerocomprobantes', 	$this->Venta->find('first' , array ('fields' => array('MAX(Venta.numerocomprobante+1) as numerocomprobante'  ))));

		$this->set(compact('clientes', 'ordentrabajos', 'productos','productosprecios','productosstock','productosdescuentos'));


	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->loadModel("Producto");

		if (!$this->Venta->exists($id)) {
			throw new NotFoundException(__('Venta Invalida'));
		}
		if ($this->request->is('post')) {
			$this->request->data['Venta']['fecha']=date('Y-m-d',strtotime($this->request->data['Venta']['fecha']));
			if ($this->Venta->saveAll($this->request->data)) {
				$this->Session->setFlash(__('La venta a sido modificada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La venta NO a sido modificada. Por favor intente nuevamente'));
			}
		} else {
			$options = array('conditions' => array('Venta.' . $this->Venta->primaryKey => $id));
			$this->request->data = $this->Venta->find('first', $options);
		}
		$clientes = $this->Venta->Cliente->find('list');
		//$ordendetrabajos = $this->Venta->Ordentrabajo->find('list');
		$productos = $this->Producto->find('list');
		$productosprecios = $this->Producto->find('list', array('fields' =>array('id','precio')));
		$productosstock = $this->Producto->find('list', array('fields' =>array('id','cantidad')));
		$this->set(compact('clientes', 'ordentrabajos', 'productos','productosprecios','productosstock'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Venta->id = $id;
		if (!$this->Venta->exists()) {
			throw new NotFoundException(__('Invalid venta'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Venta->delete()) {
			$this->Session->setFlash(__('The venta has been deleted.'));
		} else {
			$this->Session->setFlash(__('The venta could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
