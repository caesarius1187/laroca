<?php
App::uses('AppController', 'Controller');
/**
 * Detalleventas Controller
 *
 * @property Detalleventa $Detalleventa
 * @property PaginatorComponent $Paginator
 */
class DetalleventasController extends AppController {

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
		$this->Detalleventa->recursive = 0;
		$this->set('detalleventas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Detalleventa->exists($id)) {
			throw new NotFoundException(__('Invalid detalleventa'));
		}
		$options = array('conditions' => array('Detalleventa.' . $this->Detalleventa->primaryKey => $id));
		$this->set('detalleventa', $this->Detalleventa->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Detalleventa->create();
			if ($this->Detalleventa->save($this->request->data)) {
				$this->Session->setFlash(__('The detalleventa has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalleventa could not be saved. Please, try again.'));
			}
		}
		$ventas = $this->Detalleventa->Venta->find('list');
		$productos = $this->Detalleventa->Producto->find('list');
		$this->set(compact('ventas', 'productos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Detalleventa->exists($id)) {
			throw new NotFoundException(__('Invalid detalleventa'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Detalleventa->save($this->request->data)) {
				$this->Session->setFlash(__('The detalleventa has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detalleventa could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Detalleventa.' . $this->Detalleventa->primaryKey => $id));
			$this->request->data = $this->Detalleventa->find('first', $options);
		}
		$ventas = $this->Detalleventa->Ventum->find('list');
		$productos = $this->Detalleventa->Producto->find('list');
		$this->set(compact('ventas', 'productos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Detalleventa->id = $id;
		if (!$this->Detalleventa->exists()) {
			throw new NotFoundException(__('Invalid detalleventa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Detalleventa->delete()) {
			$this->Session->setFlash(__('The detalleventa has been deleted.'));
		} else {
			$this->Session->setFlash(__('The detalleventa could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
