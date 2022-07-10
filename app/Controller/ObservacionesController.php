<?php
App::uses('AppController', 'Controller');
/**
 * Observaciones Controller
 *
 * @property Partido $Partido
 * @property PaginatorComponent $Paginator
 */
class ObservacionesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');


/**
 * add method
 *
 * @return void
 */
	public function add() {
		$data=[];
		$data['error']='0';
		debug($this->request->data);
		if ($this->request->is('post')) {
			$this->Observacione->create();
			$data = [];
			$data['Observacione']=[];
			$data['Observacione']['descripcion']=$this->request->data['Ordentrabajo']['observaciondescripcion'];
			$data['Observacione']['user']=88;


			$this->Observacione->descripcion = $this->request->data['Ordentrabajo']['observaciondescripcion'];
			debug($this->Observacione);
			if ($this->Observacione->save($this->request->data)) {
				$data['respuesta']='La observacion ha sido creada.';
			} else {
				$data['respuesta']='Invalid Observacione';
				$data['error']='1';
			}
		}
		$this->layout = 'ajax';
		$this->set('data', $data);
		$this->render('serializejson');
		return ;
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
	}
}
