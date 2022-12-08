<?php
App::uses('AppController', 'Controller');
/**
 * Ordentrabajos Controller
 *
 * @property Ordentrabajo $Ordentrabajo
 * @property PaginatorComponent $Paginator
 */
class OrdentrabajosController extends AppController {

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
	public function index($estado=null) {
		$estadoUsado = false;
		if($estado!=null){
			$estadoUsado = $estado;
		}
		$options = array(
			'contain'=>array(
				'User',
				'Prepara',
				'Cliente',
				'Tipocliente',
				'Detalleordentrabajo'=>array(
					'Producto'
				),
			),
			'conditions'=>array(
				'Ordentrabajo.yaentregada'=>$estadoUsado
			),
			'limit'=>500,
			'order'=>['Ordentrabajo.id DESC']
		);
		//$this->Ordentrabajo->recursive = 0;
		$this->set('ordentrabajos', $this->Ordentrabajo->find('all',$options));
		$this->set('estadousado', $estadoUsado);
		$this->set('usuarioTipo', $this->Session->read('Auth.User.tipo'));		
	}

	public function informe($clienteId=null) {
		$options = array(
			'contain'=>array(
				'User',
				'Prepara',
				'Cliente',
				'Tipocliente',
				'Detalleordentrabajo'=>array(
					'Producto'
				),
			),
			'conditions'=>array(
				'Ordentrabajo.cliente_id'=>$clienteId,
				'Ordentrabajo.saldo > 0'
			),
			'limit'=>500,
			'order'=>['Ordentrabajo.id DESC']
		);
		//$this->Ordentrabajo->recursive = 0;
		$this->set('ordentrabajos', $this->Ordentrabajo->find('all',$options));
		$this->set('clienteId', $clienteId);
		$this->set('usuarioTipo', $this->Session->read('Auth.User.tipo'));		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ordentrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid ordentrabajo'));
		}
		$options = array(
			'contain'=>[
				'Observacione'=>[],
				'Detalleordentrabajo'=>[
					'Producto'
				],
				'Cliente'
			],
			'conditions' => array(
				'Ordentrabajo.' . $this->Ordentrabajo->primaryKey => $id
			)
		);
		$ordentrabajo=$this->Ordentrabajo->find('first', $options);
		$this->set('ordentrabajo', $ordentrabajo);
		$this->set('usuarioTipo', $this->Session->read('Auth.User.tipo'));
		
		//$this->loadModel('Producto');
		
		//$productos = $this->Producto->find('list');

		//$producto = $this->Producto->find('first',$productosCond);	

		//$this->set(compact('productos'));
	}

	public function recibo($id = null) {
		if (!$this->Ordentrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid ordentrabajo'));
		}
		$options = array(
			'contain'=>[
				'Detalleordentrabajo'=>[
					'Producto'
				],
				'Pago'=>[
					'order' => ['id' => 'DESC'],
					'limit'=>1
				],
				'Cliente'
			],
			'conditions' => array(
				'Ordentrabajo.' . $this->Ordentrabajo->primaryKey => $id
			)
		);
		$ordentrabajo=$this->Ordentrabajo->find('first', $options);
		$this->set('ordentrabajo', $ordentrabajo);
		$this->set('usuarioTipo', $this->Session->read('Auth.User.tipo'));
		
		//$this->loadModel('Producto');
		
		//$productos = $this->Producto->find('list');

		//$producto = $this->Producto->find('first',$productosCond);	

		//$this->set(compact('productos'));
	}

	public function ordenips($id = null) {
		if (!$this->Ordentrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid ordentrabajo'));
		}
		$options = array(
			'contain'=>[
				'Detalleordentrabajo'=>[
					'Producto'
				],
				'Cliente'
			],
			'conditions' => array(
				'Ordentrabajo.' . $this->Ordentrabajo->primaryKey => $id
			)
		);
		$ordentrabajo=$this->Ordentrabajo->find('first', $options);
		$this->set('ordentrabajo', $ordentrabajo);
		
		//$this->loadModel('Producto');
		
		//$productos = $this->Producto->find('list');

		//$producto = $this->Producto->find('first',$productosCond);	

		//$this->set(compact('productos'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {	
		
		$this->loadModel('Producto');
		$this->loadModel('Manodeobra');
		if ($this->request->is('post')) {
			$this->Ordentrabajo->create();
                        if($this->request->data['Ordentrabajo']['fchautorizacion']!=null&&$this->request->data['Ordentrabajo']['fchautorizacion']!='')
			$this->request->data('Ordentrabajo.fchautorizacion',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fchautorizacion'])));
			if($this->request->data['Ordentrabajo']['fechanacimiento1']!=null&&$this->request->data['Ordentrabajo']['fechanacimiento1']!='')
                            $this->request->data('Ordentrabajo.fechanacimiento1',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechanacimiento1'])));
			if($this->request->data['Ordentrabajo']['fechadefuncion1']!=null&&$this->request->data['Ordentrabajo']['fechadefuncion1']!='')
                            $this->request->data('Ordentrabajo.fechadefuncion1',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechadefuncion1'])));
			if($this->request->data['Ordentrabajo']['fechanacimiento2']!=null&&$this->request->data['Ordentrabajo']['fechanacimiento2']!='')
                            $this->request->data('Ordentrabajo.fechanacimiento2',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechanacimiento2'])));
			if($this->request->data['Ordentrabajo']['fechadefuncion2']!=null&&$this->request->data['Ordentrabajo']['fechadefuncion2']!='')
                            $this->request->data('Ordentrabajo.fechadefuncion2',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechadefuncion2'])));
			if($this->request->data['Ordentrabajo']['fechanacimiento3']!=null&&$this->request->data['Ordentrabajo']['fechanacimiento3']!='')
                            $this->request->data('Ordentrabajo.fechanacimiento3',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechanacimiento3'])));
			if($this->request->data['Ordentrabajo']['fechadefuncion3']!=null&&$this->request->data['Ordentrabajo']['fechadefuncion3']!='')
                            $this->request->data('Ordentrabajo.fechadefuncion3',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechadefuncion3'])));
			if($this->request->data['Ordentrabajo']['fechaencargo']!=null&&$this->request->data['Ordentrabajo']['fechaencargo']!='')
                            $this->request->data('Ordentrabajo.fechaencargo',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechaencargo'])));
			if($this->request->data['Ordentrabajo']['fechaentrega']!=null&&$this->request->data['Ordentrabajo']['fechaentrega']!='')
                            $this->request->data('Ordentrabajo.fechaentrega',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechaentrega'])));
			if($this->request->data['Ordentrabajo']['foto']!=null&&$this->request->data['Ordentrabajo']['foto']!='')
                            $this->request->data('Ordentrabajo.foto',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['foto'])));
			if($this->request->data['Ordentrabajo']['bronce']!=null&&$this->request->data['Ordentrabajo']['bronce']!='')
                            $this->request->data('Ordentrabajo.bronce',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['bronce'])));
			if($this->request->data['Ordentrabajo']['entregada']!=null&&$this->request->data['Ordentrabajo']['entregada']!='')
                            $this->request->data('Ordentrabajo.entregada',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['entregada'])));

			/*$numerodeorden = $this->Ordentrabajo->find('first' , array ('fields' => array('MAX(Ordentrabajo.numerodeorden+1) as numerodeorden'  )));
			if(!isset($numerodeorden[0]['numerodeorden'])){
				$numerodeorden[0]['numerodeorden']=2000;
			}
			$this->request->data['Ordentrabajo']['numerodeorden']=$numerodeorden[0]['numerodeorden'];*/
			$msg="";
			if ($this->Ordentrabajo->saveAll($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('La orden de trabajo a sido guardada con exito.'));
				foreach ($this->request->data['Detalleordentrabajo'] as $detalle) {					
					$this->Producto->id = $detalle['producto_id'];

					$cantVendida =	 $detalle['cantidad'];
					$cantAnterior = $this->Producto->field('cantidad');
					$newstock =  $cantAnterior - $cantVendida;
											
					$this->Producto->id = $detalle['producto_id'];
					if($this->Producto->saveField('cantidad', $newstock)){
						$msg.='La orden de trabajo a sido guardada con exito';
						$this->Session->setFlash($msg);
					}else{
						$msg.='La orden de trabajo NO a sido registrada con exito.';
						$this->Session->setFlash($msg);
						return $this->redirect(array('action' => 'index'));
					}
				}
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La orden de trabajo No pudo ser guardada, por favor intente mas tarde.'));
			}
		}
		
		$usersCond = array('conditions' => array('tipo' => 'admin'));
		$users = $this->Ordentrabajo->User->find('list',$usersCond);
		$userPreparas = $this->Ordentrabajo->User->find('list');
		
		$clientes = $this->Ordentrabajo->Cliente->find('list',array('order'=>'Cliente.nombre'));
		$tablaclientes = $this->Ordentrabajo->Cliente->find('all',['fields'=>['id','nombre'],'contain'=>[]]);		
		$tipoclientes = $this->Ordentrabajo->Tipocliente->find('list');					
		
		$optionProductos=array('order' => 'Producto.nombre', );
		$productos = $this->Producto->find('list',$optionProductos);
		
		$manodeobras = $this->Manodeobra->find('list');
		$this->set(compact('users', 'userPreparas', 'clientes','tipoclientes','productos','manodeobras','tablaclientes'));

		$numerodeorden = $this->Ordentrabajo->find('first' , array ('fields' => array('MAX(Ordentrabajo.numerodeorden+1) as numerodeorden'  )));
		if(!isset($numerodeorden[0]['numerodeorden'])){
			$numerodeorden[0]['numerodeorden']=2000;
		}
		$this->set('numerodeorden',$numerodeorden);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ordentrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid ordentrabajo'));
		}
		if ($this->request->is( 'put')) {
			$this->Ordentrabajo->create();
			if($this->request->data['Ordentrabajo']['fchautorizacion']!=null&&$this->request->data['Ordentrabajo']['fchautorizacion']!='')
			$this->request->data('Ordentrabajo.fchautorizacion',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fchautorizacion'])));
			
                        if($this->request->data['Ordentrabajo']['fechanacimiento1']!=null&&$this->request->data['Ordentrabajo']['fechanacimiento1']!='')
			$this->request->data('Ordentrabajo.fechanacimiento1',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechanacimiento1'])));

			if($this->request->data['Ordentrabajo']['fechanacimiento1']!=null&&$this->request->data['Ordentrabajo']['fechadefuncion1']!='')
			$this->request->data('Ordentrabajo.fechadefuncion1',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechadefuncion1'])));

			if($this->request->data['Ordentrabajo']['fechanacimiento2']!=null&&$this->request->data['Ordentrabajo']['fechanacimiento2']!='')
			$this->request->data('Ordentrabajo.fechanacimiento2',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechanacimiento2'])));

			if($this->request->data['Ordentrabajo']['fechanacimiento2']!=null&&$this->request->data['Ordentrabajo']['fechadefuncion2']!='')
			$this->request->data('Ordentrabajo.fechadefuncion2',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechadefuncion2'])));

			if($this->request->data['Ordentrabajo']['fechanacimiento3']!=null&&$this->request->data['Ordentrabajo']['fechanacimiento3']!='')
			$this->request->data('Ordentrabajo.fechanacimiento3',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechanacimiento3'])));

			if($this->request->data['Ordentrabajo']['fechadefuncion3']!=null&&$this->request->data['Ordentrabajo']['fechadefuncion3']!='')
			$this->request->data('Ordentrabajo.fechadefuncion3',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechadefuncion3'])));

			if($this->request->data['Ordentrabajo']['fechaencargo']!=null&&$this->request->data['Ordentrabajo']['fechaencargo']!='')
			$this->request->data('Ordentrabajo.fechaencargo',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechaencargo'])));

			if($this->request->data['Ordentrabajo']['fechaentrega']!=null&&$this->request->data['Ordentrabajo']['fechaentrega']!='')
			$this->request->data('Ordentrabajo.fechaentrega',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['fechaentrega'])));

			if($this->request->data['Ordentrabajo']['foto']!=null&&$this->request->data['Ordentrabajo']['foto']!='')
			$this->request->data('Ordentrabajo.foto',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['foto'])));

			if($this->request->data['Ordentrabajo']['bronce']!=null&&$this->request->data['Ordentrabajo']['bronce']!='')
			$this->request->data('Ordentrabajo.bronce',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['bronce'])));

			if($this->request->data['Ordentrabajo']['entregada']!=null&&$this->request->data['Ordentrabajo']['entregada']!='')
			$this->request->data('Ordentrabajo.entregada',date('Y-m-d',strtotime($this->request->data['Ordentrabajo']['entregada'])));

			if ($this->Ordentrabajo->saveAll($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('La orden de trabajo a sido guardada.'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ordentrabajo could not be saved. Please, try again.'));
			}
		} else {
			$orden=$this->Ordentrabajo->find('first', array(
										   'contain'=>array(
										      'User',
										      
										      'Cliente',
										      'Tipocliente',
										      'Observacione'=>['User'],
										      //'Producto',										      	
										      'Detalleordentrabajo'=>array(
										      	'Producto'=>array('fields'=>array('nombre'))
										      	),
										      'Pago'=>array(
										      	),
										      'Manoobraxordentrabajo' =>array(
										      	'Manodeobra'=>array('fields'=>array('nombre'))
										      	)										      	
										    ),
										   'conditions' => array(
											                'Ordentrabajo.id' => $id, // <-- Notice this addition
											            ),
										));	
			$this->request->data = $orden;
		}		
		
		$this->loadModel('Producto');
		$this->loadModel('Pago');
		//$this->loadModel('Manodeobra');

		$userCond = array('conditions' => array('User.id' => $this->request->data['Ordentrabajo']['user_id'] ));
		$users = $this->Ordentrabajo->User->find('list', $userCond);

		//$usersReparaCond = array('conditions' => array('tipo' => 'tecnico'));
		$userPreparas = $this->Ordentrabajo->User->find('list');
		
		//$cliCond = array('conditions' => array('Cliente.id' => $this->request->data['Ordentrabajo']['cliente_id'] ));
		$clientes = $this->Ordentrabajo->Cliente->find('list');//,$cliCond);		
		$tipoclientes = $this->Ordentrabajo->Tipocliente->find('list');		
		$tablaclientes = $this->Ordentrabajo->Cliente->find('all',['fields'=>['id','nombre'],'contain'=>[]]);
		$optionProductos=array('order' => 'Producto.nombre', );
		$productos = $this->Producto->find('list',$optionProductos);
		$this->set(compact('users', 'clientes','tipoclientes','tablaclientes','productos','userPreparas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ordentrabajo->id = $id;
		if (!$this->Ordentrabajo->exists()) {
			throw new NotFoundException(__('Invalid ordentrabajo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ordentrabajo->delete()) {
			$this->Session->setFlash(__('The ordentrabajo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ordentrabajo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
