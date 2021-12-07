<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
class ClientesController extends AppController {

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
	public function index($id = null, $action = '') 
	{
		//$this->Cliente->recursive = 0;
		//$this->set('clientes', $this->Paginator->paginate());
		$this->set('clientes', $this->Cliente->find('all'));

		// Para ver los datos del cliente en el index de clientes.
		$mostrarView = false;
		//$agregarCliente = false;
		$editarCliente = false;
		$TablaClientesWidth = 54;

		$this->loadModel('Localidade');
		$this->loadModel('Partido');
		if($id != null)
		{		
			if ($action == 'view')
			{
				//Ver Cliente
				if (!$this->Cliente->exists($id)) 
				{
					throw new NotFoundException(__('Cliente invalido'));
				}
				$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
				$this->set('cliente', $this->Cliente->find('first', $options));

				$mostrarView = true;
			}
			if ($action == 'edit')
			{
				$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
				$this->request->data = $this->Cliente->find('first', $options);					

				$editarCliente = true;				

				$optionsMyLoc = array('conditions' => array('Localidade.id' => $this->request->data['Cliente']['localidade_id']));	
				$miloc = $this->Localidade->find('first',$optionsMyLoc);
				$this->set('miLoc',$miloc);
				$partidos = $this->Partido->find('list');
				$this->set('partidos', $partidos);
				$optionsLoc = array('conditions' => array('Localidade.partido_id' => $miloc['Localidade']['partido_id']));	
				$this->set('localidades', $this->Localidade->find('list',$optionsLoc));
			}						 
		}
		else
		{
			$TablaClientesWidth = 100;

			$partidos = $this->Partido->find('list');
			$this->set('partidos', $partidos);
			$optionsLoc = array('conditions' => array('Localidade.partido_id' => array_keys($partidos)[0]));	
			$this->set('localidades', $this->Localidade->find('list',$optionsLoc));
		}	
		$this->set('TablaClientesWidth', $TablaClientesWidth);
		$this->set('mostrarView', $mostrarView);
		//$this->set('agregarCliente', $agregarCliente);
		$this->set('editarCliente', $editarCliente);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) 
	{
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
		$this->set('cliente', $this->Cliente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() 
	{
		if ($this->request->is('post')) {
			$this->Cliente->create();
			//echo $this->request->data
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('El Cliente ha sido guardado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				//debug($this->Cliente->invalidFields());
				$this->Session->setFlash(__('El Cliente NO ha sido guardado. Por favor intente de nuevo pas tarde'));
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
	public function edit($id = null) 
	{
		if (!$this->Cliente->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is('put')) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('El cliente ha sido modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cliente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cliente.' . $this->Cliente->primaryKey => $id));
			$this->request->data = $this->Cliente->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) 
	{
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Cliente->delete()) {
			$this->Session->setFlash(__('El cliente ha sido eliminado.'));
		} else {
			$this->Session->setFlash(__('The cliente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
