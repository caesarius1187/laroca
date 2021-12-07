<?php
App::uses('AppController', 'Controller');
/**
 * TiposClientes Controller
 *
 * @property TiposClientes $TiposClientes
 * @property PaginatorComponent $Paginator
 */
class TipoclientesController extends AppController 
{

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator','Session');


	public function index($id = null) {
		$this->Tipocliente->recursive = 0;
		$this->set('tipoclientes', $this->Paginator->paginate());

		$editarTipoCliente = false;
		$TablaTipoClientesWidth = 50;	
		if($id != null)
		{
			if (!$this->Tipocliente->exists($id)) {
				throw new NotFoundException(__('Tipo de cliente no valido.'));
			}
			$options = array('conditions' => array('Tipocliente.' . $this->Tipocliente->primaryKey => $id));
			$this->request->data = $this->Tipocliente->find('first', $options);

			$editarTipoCliente = true;
		}
		else
		{
			$TablaTipoClientesWidth = 100;
		}	
		$this->set('TablaTipoClientesWidth', $TablaTipoClientesWidth);
		$this->set('editarTipoCliente', $editarTipoCliente);
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Tipocliente->create();					
			if ($this->Tipocliente->save($this->request->data)) {
				$this->Session->setFlash(__('El Tipo de cliente ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El tipo no pudo ser guardado. Por favor intente nuevamente.'));
			}
		}	
	}

	public function edit($id = null) {
		if (!$this->Tipocliente->exists($id)) {
			throw new NotFoundException(__('Tipo de cliente no valido.'));
		}
		if ($this->request->is('put')) {
			if ($this->Tipocliente->save($this->request->data)) {
				$this->Session->setFlash(__('El tipo de cliente ha sido modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La falla no ha sido modificada. Intente nuevamente.'));
			}
		} 	
	}

	public function delete($id = null) {
		$this->Tipocliente->id = $id;
		if (!$this->Tipocliente->exists()) {
			throw new NotFoundException(__('Tipo de cliente no valido.'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipocliente->delete()) {
			$this->Session->setFlash(__('El tipo de cliente ha sido eliminado.'));
		} else {
			$this->Session->setFlash(__('El tipo de cliente no se pudo eliminar. Por favor, intente nuevamente.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
