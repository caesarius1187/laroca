<?php
App::uses('AppController', 'Controller');
/**
 * Detalleordentrabajos Controller
 *
 * @property Detalleordentrabajo $Detalleordentrabajo
 * @property PaginatorComponent $Paginator
 */
class DetalleordentrabajosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Detalleordentrabajo->recursive = 0;
		$this->set('detalleordentrabajos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Detalleordentrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid detalleordentrabajo'));
		}
		$options = array('conditions' => array('Detalleordentrabajo.' . $this->Detalleordentrabajo->primaryKey => $id));
		$this->set('detalleordentrabajo', $this->Detalleordentrabajo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Detalleordentrabajo->create();
			if ($this->Detalleordentrabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The detalleordentrabajo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalleordentrabajo could not be saved. Please, try again.'));
			}
		}
		$productos = $this->Detalleordentrabajo->Producto->find('list');
		$ordendetrabajos = $this->Detalleordentrabajo->Ordendetrabajo->find('list');
		$this->set(compact('productos', 'ordendetrabajos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Detalleordentrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid detalleordentrabajo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Detalleordentrabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The detalleordentrabajo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalleordentrabajo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Detalleordentrabajo.' . $this->Detalleordentrabajo->primaryKey => $id));
			$this->request->data = $this->Detalleordentrabajo->find('first', $options);
		}
		$productos = $this->Detalleordentrabajo->Producto->find('list');
		$ordendetrabajos = $this->Detalleordentrabajo->Ordendetrabajo->find('list');
		$this->set(compact('productos', 'ordendetrabajos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Detalleordentrabajo->id = $id;
		$data=[];
		$data['error']='0';
		if (!$this->Detalleordentrabajo->exists()) {
			$data['respuesta']='Invalid detalleordentrabajo';
			$data['error']='1';
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Detalleordentrabajo->delete()) {
			$data['respuesta']='EL detalle de la orden ha sido eliminado.';
		} else {
			$data['respuesta']='EL detalle de la orden NO ha sido eliminado. Por favor intentelo de nuevo mas tarde';
			$data['error']='2';
		}
		$this->layout = 'ajax';
		$this->set('data', $data);
		$this->render('serializejson');
		return ;
	}}
