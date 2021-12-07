<?php
App::uses('AppController', 'Controller');
/**
 * Manodeobras Controller
 *
 * @property Manodeobra $Manodeobra
 * @property PaginatorComponent $Paginator
 */
class ManodeobrasController extends AppController {

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
	public function index($id = null) {
		$this->Manodeobra->recursive = 0;
		$this->set('manodeobras', $this->Paginator->paginate());

		$editarManoObra = false;
		$TablaManoObraWidth = 55;
		if($id != null)
		{			
			$options = array('conditions' => array('Manodeobra.' . $this->Manodeobra->primaryKey => $id));
			$this->request->data = $this->Manodeobra->find('first', $options);

			$editarManoObra = true;			
		}
		else
		{
			$TablaManoObraWidth = 100;
		}
		$this->set('TablaManoObraWidth', $TablaManoObraWidth);
		$this->set('editarManoObra', $editarManoObra);		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Manodeobra->exists($id)) {
			throw new NotFoundException(__('Invalid manodeobra'));
		}
		$options = array('conditions' => array('Manodeobra.' . $this->Manodeobra->primaryKey => $id));
		$this->set('manodeobra', $this->Manodeobra->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Manodeobra->create();
			if ($this->Manodeobra->save($this->request->data)) {
				$this->Session->setFlash(__('Mano de Obra ha sido guardada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo guardar la mano de obra. Por favor, intente nuevamente.'));
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
		if (!$this->Manodeobra->exists($id)) {
			throw new NotFoundException(__('Invalid manodeobra'));
		}
		if ($this->request->is('put')) {
			if ($this->Manodeobra->save($this->request->data)) {
				$this->Session->setFlash(__('Mano de Obra modificada con exito.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo modificar mano de obra. Por favor, intente nuevamente.'));
			}
		} else {
			$options = array('conditions' => array('Manodeobra.' . $this->Manodeobra->primaryKey => $id));
			$this->request->data = $this->Manodeobra->find('first', $options);
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
		$this->Manodeobra->id = $id;
		if (!$this->Manodeobra->exists()) {
			throw new NotFoundException(__('Invalid manodeobra'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Manodeobra->delete()) {
			$this->Session->setFlash(__('Mano de obra ha sido eliminada.'));
		} else {
			$this->Session->setFlash(__('No se pudo eliminar mano de Obra. Por favor, intente nuevamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function getdetalle() {
		$manodeobra_id = 0;
		if(isset($this->request->data['Ordentrabajo']))
			$manodeobra_id = $this->request->data['Ordentrabajo']['manodeobra_id'];		
		$manodeobras = $this->Manodeobra->find('first', array(
			'conditions' => array('Manodeobra.id' => $manodeobra_id),
			'recursive' => -1
		));
		 
		$this->set('manodeobras',$manodeobras);
		$this->layout = 'ajax';
	}	
}
