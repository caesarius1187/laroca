<?php
App::uses('AppController', 'Controller');
/**
 * Detallecompras Controller
 *
 * @property Detallecompra $Detallecompra
 * @property PaginatorComponent $Paginator
 */
class DetallecomprasController extends AppController {

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
		$this->Detallecompra->recursive = 0;
		$this->set('detallecompras', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Detallecompra->exists($id)) {
			throw new NotFoundException(__('Invalid detallecompra'));
		}
		$options = array('conditions' => array('Detallecompra.' . $this->Detallecompra->primaryKey => $id));
		$this->set('detallecompra', $this->Detallecompra->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Detallecompra->create();
			if ($this->Detallecompra->save($this->request->data)) {
				$this->Session->setFlash(__('The detallecompra has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detallecompra could not be saved. Please, try again.'));
			}
		}
		$compras = $this->Detallecompra->Compra->find('list');
		$productos = $this->Detallecompra->Producto->find('list');
		$this->set(compact('compras', 'productos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Detallecompra->exists($id)) {
			throw new NotFoundException(__('Invalid detallecompra'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Detallecompra->save($this->request->data)) {
				$this->Session->setFlash(__('The detallecompra has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The detallecompra could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Detallecompra.' . $this->Detallecompra->primaryKey => $id));
			$this->request->data = $this->Detallecompra->find('first', $options);
		}
		$compras = $this->Detallecompra->Compra->find('list');
		$productos = $this->Detallecompra->Producto->find('list');
		$this->set(compact('compras', 'productos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Detallecompra->id = $id;
		if (!$this->Detallecompra->exists()) {
			throw new NotFoundException(__('Invalid detallecompra'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Detallecompra->delete()) {
			$this->Session->setFlash(__('The detallecompra has been deleted.'));
		} else {
			$this->Session->setFlash(__('The detallecompra could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
