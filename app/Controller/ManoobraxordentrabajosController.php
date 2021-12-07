<?php
App::uses('AppController', 'Controller');
/**
 * Manoobraxordentrabajos Controller
 *
 * @property Manoobraxordentrabajo $Manoobraxordentrabajo
 * @property PaginatorComponent $Paginator
 */
class ManoobraxordentrabajosController extends AppController {

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
		$this->Manoobraxordentrabajo->recursive = 0;
		$this->set('manoobraxordentrabajos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Manoobraxordentrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid manoobraxordentrabajo'));
		}
		$options = array('conditions' => array('Manoobraxordentrabajo.' . $this->Manoobraxordentrabajo->primaryKey => $id));
		$this->set('manoobraxordentrabajo', $this->Manoobraxordentrabajo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Manoobraxordentrabajo->create();
			if ($this->Manoobraxordentrabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The manoobraxordentrabajo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manoobraxordentrabajo could not be saved. Please, try again.'));
			}
		}
		$ordentrabajos = $this->Manoobraxordentrabajo->Ordentrabajo->find('list');
		$manodeobras = $this->Manoobraxordentrabajo->Manodeobra->find('list');
		$this->set(compact('ordentrabajos', 'manodeobras'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Manoobraxordentrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid manoobraxordentrabajo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Manoobraxordentrabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The manoobraxordentrabajo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manoobraxordentrabajo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Manoobraxordentrabajo.' . $this->Manoobraxordentrabajo->primaryKey => $id));
			$this->request->data = $this->Manoobraxordentrabajo->find('first', $options);
		}
		$ordentrabajos = $this->Manoobraxordentrabajo->Ordentrabajo->find('list');
		$manodeobras = $this->Manoobraxordentrabajo->Manodeobra->find('list');
		$this->set(compact('ordentrabajos', 'manodeobras'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Manoobraxordentrabajo->id = $id;
		if (!$this->Manoobraxordentrabajo->exists()) {
			throw new NotFoundException(__('Invalid manoobraxordentrabajo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Manoobraxordentrabajo->delete()) {
			$this->Session->setFlash(__('The manoobraxordentrabajo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The manoobraxordentrabajo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}


	
}
