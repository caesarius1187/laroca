<?php
App::uses('AppController', 'Controller');
/**
 * Compras Controller
 *
 * @property Compra $Compra
 * @property PaginatorComponent $Paginator
 */
class ComprasController extends AppController {

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
		$this->Compra->recursive = 0;
		$this->set('compras', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Compra->exists($id)) {
			throw new NotFoundException(__('Invalid compra'));
		}
		$options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
		$this->set('compra', $this->Compra->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel("Producto");
		if ($this->request->is('post')) {
			$this->Compra->create();
			$this->request->data['Compra']['fecha']=date('Y-m-d',strtotime($this->request->data['Compra']['fecha']));

			if ($this->Compra->saveAll($this->request->data)) 
			{	
				//esta seccion no la vamos a implementar mas por que ya no se van a guardar los datos necesario para mantener el stockactualizado
				/*foreach ($this->request->data['Detallecompra'] as $detalle) 
				{
					if (!$this->Producto->exists($detalle['producto_id'])) 
					{
						throw new NotFoundException(__('Producto Invalido'));
					}	

					$this->Producto->read(null,$detalle['producto_id']);

					//$this->Producto->id = $detalle['producto_id'];
					$precioComProd = $detalle['precioproducto'];
					$porcUtilidad = $detalle['porcutilidad'];
					$porcFlete = $detalle['porcflete'];
					$pcioVenta = $detalle['precioventa'];
					$porcDesc = $detalle['porcdescuento'];
					$pcioDesc = $detalle['preciodesc'];
					$catidad = $detalle['cantidad'];
					$cantAnterior = $this->Producto->field('cantidad');
					$nuevostock =  $cantAnterior + $catidad;
					
					$this->Producto->set('preciocompra',$precioComProd);
					$this->Producto->set('porcutilidad',$porcUtilidad);
					$this->Producto->set('porcflete',$porcFlete);
					$this->Producto->set('precioventa',$pcioVenta);
					$this->Producto->set('porcdescuento',$porcDesc);
					$this->Producto->set('precio',$pcioDesc);
					$this->Producto->set('cantidad',$nuevostock);

					if($this->Producto->save())
					{
						$msg = 'La compra ha sido registrada con exito.';
					}
					else
					{
						$msg ='La compra no se pudo guardar. Por favor, intente nuevamente.';												
					}					
				}*/
				$this->Session->setFlash($msg);						
				return $this->redirect(array('action' => 'index'));
			} 
			else 
			{
				$this->Session->setFlash(__('La compra no se pudo guardar. Por favor, intente nuevamente.'));
			}
		}		

		$productos = $this->Compra->Detallecompra->Producto->find('list');
		$this->set(compact('productos'));

		//$todosLosProductos = $this->Compra->Detallecompra->Producto->find('all', array('recursive' => 0, 'fields' => array('id','nombre','precioventa','preciocompra')));
		$todosLosProductos = $this->Compra->Detallecompra->Producto->find('all', array('recursive' => 0));
		$this->set(compact('todosLosProductos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Compra->exists($id)) {
			throw new NotFoundException(__('Invalid compra'));
		}
		if ($this->request->is('post')) {
			if ($this->Compra->save($this->request->data)) {
				$this->Session->setFlash(__('The compra has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The compra could not be saved. Please, try again.'));
			}
		} 
		else 
		{
			//$this->Compra->recursive = 2;
			$options = array('conditions' => array('Compra.' . $this->Compra->primaryKey => $id));
			$this->request->data = $this->Compra->find('first', $options);
		}		

		$productos = $this->Compra->Detallecompra->Producto->find('list');
		$this->set(compact('productos'));
		
		//$todosLosProductos = $this->Compra->Detallecompra->Producto->find('all', array('recursive' => 0));
		//$this->set(compact('todosLosProductos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Compra->id = $id;
		if (!$this->Compra->exists()) {
			throw new NotFoundException(__('Invalid compra'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Compra->delete()) {
			$this->Session->setFlash(__('The compra has been deleted.'));
		} else {
			$this->Session->setFlash(__('The compra could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
