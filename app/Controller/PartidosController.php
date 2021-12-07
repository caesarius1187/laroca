<?php
App::uses('AppController', 'Controller');
/**
 * Partidos Controller
 *
 * @property Partido $Partido
 * @property PaginatorComponent $Paginator
 */
class PartidosController extends AppController {

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
		$this->Partido->recursive = 0;
		$this->set('partidos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Partido->exists($id)) {
			throw new NotFoundException(__('Invalid partido'));
		}
		$options = array('conditions' => array('Partido.' . $this->Partido->primaryKey => $id));
		$this->set('partido', $this->Partido->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Partido->create();
			if ($this->Partido->save($this->request->data)) {
				$this->Session->setFlash(__('The partido has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partido could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Partido->exists($id)) {
			throw new NotFoundException(__('Invalid partido'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Partido->save($this->request->data)) {
				$this->Session->setFlash(__('The partido has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The partido could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Partido.' . $this->Partido->primaryKey => $id));
			$this->request->data = $this->Partido->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Partido->id = $id;
		if (!$this->Partido->exists()) {
			throw new NotFoundException(__('Invalid partido'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Partido->delete()) {
			$this->Session->setFlash(__('The partido has been deleted.'));
		} else {
			$this->Session->setFlash(__('The partido could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
