<?php
App::uses('AppController', 'Controller');
/**
 * Presupuestos Controller
 *
 * @property Presupuesto $Presupuesto
 * @property PaginatorComponent $Paginator
 */
class PresupuestosController extends AppController {

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
		$options = array(
			'contain'=>array(
				'Detallepresupuesto'=>array(
					'Producto'
				),
			),
			'conditions'=>array(
			),
			'limit'=>500,
			'order'=>['Presupuesto.id DESC']
		);
		//$this->Presupuesto->recursive = 0;
		$this->set('presupuestos', $this->Presupuesto->find('all',$options));
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Presupuesto->exists($id)) {
			throw new NotFoundException(__('Invalid presupuesto'));
		}
		$options = array(
			'contain'=>[
				'Detallepresupuesto'=>[
					'Producto',
					'Material'
				],
			],
			'conditions' => array(
				'Presupuesto.' . $this->Presupuesto->primaryKey => $id
			)
		);
		$presupuesto=$this->Presupuesto->find('first', $options);
		$this->set('presupuesto', $presupuesto);
		$this->set('usuarioTipo', $this->Session->read('Auth.User.tipo'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {	
		$this->loadModel('Producto');
		if ($this->request->is('post')) {
			$this->Presupuesto->create();
			$msg="";
			if ($this->Presupuesto->saveAll($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('El presupuesto a sido guardado con exito.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El presupuesto No pudo ser guardado, por favor intente mas tarde.'));
			}
		}
		$optionProductos=array('order' => 'Producto.nombre', );
		$productos = $this->Producto->find('list',$optionProductos);
		$optionMateriales=array(
			'order' => 'Producto.nombre', 
			'conditions' => ['tipo'=>'Material'], 
		);
		$materiales = $this->Producto->find('list',$optionMateriales);
		$this->set(compact('productos','materiales'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->loadModel('Caja');
		$conditions = array(
		    'Caja.usuarioCierre_id' => null,
		);
		if (!$this->Caja->hasAny($conditions)){
		    $msg = 'Primero debe abrir una caja';
			$this->Session->setFlash($msg);
		    return $this->redirect(array('action' => 'index'));
		}
		if (!$this->Presupuesto->exists($id)) {
			throw new NotFoundException(__('Invalid presupuesto'));
		}
		if ($this->request->is( 'put')) {
			$this->Presupuesto->create();
			if($this->request->data['Presupuesto']['fchautorizacion']!=null&&$this->request->data['Presupuesto']['fchautorizacion']!='')
			$this->request->data('Presupuesto.fchautorizacion',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fchautorizacion'])));
			
                        if($this->request->data['Presupuesto']['fechanacimiento1']!=null&&$this->request->data['Presupuesto']['fechanacimiento1']!='')
			$this->request->data('Presupuesto.fechanacimiento1',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fechanacimiento1'])));

			if($this->request->data['Presupuesto']['fechadefuncion1']!=null&&$this->request->data['Presupuesto']['fechadefuncion1']!='')
			$this->request->data('Presupuesto.fechadefuncion1',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fechadefuncion1'])));

			if($this->request->data['Presupuesto']['fechanacimiento2']!=null&&$this->request->data['Presupuesto']['fechanacimiento2']!='')
			$this->request->data('Presupuesto.fechanacimiento2',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fechanacimiento2'])));

			if($this->request->data['Presupuesto']['fechadefuncion2']!=null&&$this->request->data['Presupuesto']['fechadefuncion2']!='')
			$this->request->data('Presupuesto.fechadefuncion2',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fechadefuncion2'])));

			if($this->request->data['Presupuesto']['fechanacimiento3']!=null&&$this->request->data['Presupuesto']['fechanacimiento3']!='')
			$this->request->data('Presupuesto.fechanacimiento3',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fechanacimiento3'])));

			if($this->request->data['Presupuesto']['fechadefuncion3']!=null&&$this->request->data['Presupuesto']['fechadefuncion3']!='')
			$this->request->data('Presupuesto.fechadefuncion3',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fechadefuncion3'])));

			if($this->request->data['Presupuesto']['fechaencargo']!=null&&$this->request->data['Presupuesto']['fechaencargo']!='')
			$this->request->data('Presupuesto.fechaencargo',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fechaencargo'])));

			if($this->request->data['Presupuesto']['fechaentrega']!=null&&$this->request->data['Presupuesto']['fechaentrega']!='')
			$this->request->data('Presupuesto.fechaentrega',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fechaentrega'])));

			if($this->request->data['Presupuesto']['foto']!=null&&$this->request->data['Presupuesto']['foto']!='')
			$this->request->data('Presupuesto.foto',date('Y-m-d',strtotime($this->request->data['Presupuesto']['foto'])));

			if($this->request->data['Presupuesto']['bronce']!=null&&$this->request->data['Presupuesto']['bronce']!='')
			$this->request->data('Presupuesto.bronce',date('Y-m-d',strtotime($this->request->data['Presupuesto']['bronce'])));

			if($this->request->data['Presupuesto']['entregada']!=null&&$this->request->data['Presupuesto']['entregada']!='')
			$this->request->data('Presupuesto.entregada',date('Y-m-d',strtotime($this->request->data['Presupuesto']['entregada'])));

			if($this->request->data['Presupuesto']['fechaencargobronce']!=null&&$this->request->data['Presupuesto']['fechaencargobronce']!='')
			$this->request->data('Presupuesto.fechaencargobronce',date('Y-m-d',strtotime($this->request->data['Presupuesto']['fechaencargobronce'])));

			if ($this->Presupuesto->saveAll($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('La orden de trabajo a sido guardada.'));

				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The presupuesto could not be saved. Please, try again.'));
			}
		} else {
			$orden=$this->Presupuesto->find('first', array(
										   'contain'=>array(
										      'User',
										      
										      'Cliente',
										      'Observacione'=>['User'],
										      //'Producto',										      	
										      'Detallepresupuesto'=>array(
										      	'Producto'=>array('fields'=>array('nombre'))
										      	),
										      'Pago'=>array(
										      	),
										      'Manoobraxpresupuesto' =>array(
										      	'Manodeobra'=>array('fields'=>array('nombre'))
										      	)										      	
										    ),
										   'conditions' => array(
											                'Presupuesto.id' => $id, // <-- Notice this addition
											            ),
										));	
			$this->request->data = $orden;
		}		
		
		$this->loadModel('Producto');
		$this->loadModel('Pago');
		//$this->loadModel('Manodeobra');

		$userCond = array('conditions' => array('User.id' => $this->request->data['Presupuesto']['user_id'] ));
		$users = $this->Presupuesto->User->find('list', $userCond);

		//$usersReparaCond = array('conditions' => array('tipo' => 'tecnico'));
		$userPreparas = $this->Presupuesto->User->find('list');
		
		//$cliCond = array('conditions' => array('Cliente.id' => $this->request->data['Presupuesto']['cliente_id'] ));
		$clientes = $this->Presupuesto->Cliente->find('list');//,$cliCond);		
		$tablaclientes = $this->Presupuesto->Cliente->find('all',['fields'=>['id','nombre'],'contain'=>[]]);
		$optionProductos=array('order' => 'Producto.nombre', );
		$productos = $this->Producto->find('list',$optionProductos);
		$this->set(compact('users', 'clientes','tablaclientes','productos','userPreparas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Presupuesto->id = $id;
		if (!$this->Presupuesto->exists()) {
			throw new NotFoundException(__('Invalid presupuesto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Presupuesto->delete()) {
			$this->Session->setFlash(__('The presupuesto has been deleted.'));
		} else {
			$this->Session->setFlash(__('The presupuesto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
