<?php
App::uses('AppController', 'Controller');
/**
 * Ordendetrabajos Controller
 *
 * @property Ordendetrabajo $Ordendetrabajo
 * @property PaginatorComponent $Paginator
 */
class OrdendetrabajosController extends AppController {

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
		$this->Ordendetrabajo->recursive = 0;
		$this->set('ordendetrabajos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Ordendetrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid ordendetrabajo'));
		}
		$options = array('conditions' => array('Ordendetrabajo.' . $this->Ordendetrabajo->primaryKey => $id));
		$this->set('ordendetrabajo', $this->Ordendetrabajo->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ordendetrabajo->create();
			if ($this->Ordendetrabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The ordendetrabajo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ordendetrabajo could not be saved. Please, try again.'));
			}
		}
		$usuarios = $this->Ordendetrabajo->Usuario->find('list');
		$usuarioReparas = $this->Ordendetrabajo->UsuarioRepara->find('list');
		$clientes = $this->Ordendetrabajo->Cliente->find('list');
		$this->set(compact('usuarios', 'usuarioReparas', 'clientes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Ordendetrabajo->exists($id)) {
			throw new NotFoundException(__('Invalid ordendetrabajo'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Ordendetrabajo->save($this->request->data)) {
				$this->Session->setFlash(__('The ordendetrabajo has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ordendetrabajo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Ordendetrabajo.' . $this->Ordendetrabajo->primaryKey => $id));
			$this->request->data = $this->Ordendetrabajo->find('first', $options);
		}
		$usuarios = $this->Ordendetrabajo->Usuario->find('list');
		$usuarioReparas = $this->Ordendetrabajo->UsuarioRepara->find('list');
		$clientes = $this->Ordendetrabajo->Cliente->find('list');
		$this->set(compact('usuarios', 'usuarioReparas', 'clientes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Ordendetrabajo->id = $id;
		if (!$this->Ordendetrabajo->exists()) {
			throw new NotFoundException(__('Invalid ordendetrabajo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Ordendetrabajo->delete()) {
			$this->Session->setFlash(__('The ordendetrabajo has been deleted.'));
		} else {
			$this->Session->setFlash(__('The ordendetrabajo could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
