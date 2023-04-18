<?php
App::uses('AppController', 'Controller');
/**
 * Productos Controller
 *
 * @property Producto $Producto
 * @property PaginatorComponent $Paginator
 */
class ProductosController extends AppController {

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
	public function index($datax=null) {
		if($datax!=null){
			$this->set('datax',$datax);
		}
		$this->Producto->recursive = 0;
		$this->set('productos', $this->Producto->find('all'));				
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Producto->exists($id)) {
			throw new NotFoundException(__('Invalid producto'));
		}
		$options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
		$this->set('producto', $this->Producto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {		

		if ($this->request->is('post')) {
			$this->Producto->create();
			$this->request->data('Producto.fechacompra',date('Y-m-d',strtotime($this->request->data['Producto']['fechacompra'])));
			
			if ($this->Producto->saveAll($this->request->data, array('deep' => true))) {
				$this->Session->setFlash(__('El producto ha sido guardado.'));

				return $this->redirect(array('action' => 'index','datax'=>$this->request->data));
			} else {
				$this->Session->setFlash(__('The producto could not be saved. Please, try again.'));
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
		
		if (!$this->Producto->exists($id)) {
			throw new NotFoundException(__('Invalid producto'));
		}
		if ($this->request->is('post')) {
			$this->request->data('Producto.fechacompra',date('Y-m-d',strtotime($this->request->data['Producto']['fechacompra'])));
			/*$this->request->data('Producto.id',$id);
			$this->request->data['Producto']['id']=$id;*/
			if ($this->Producto->saveAll($this->request->data, array('deep' => true))) {
				$this->set('datax',$this->request->data);
				$this->Session->setFlash(__('El producto ha sido Modificado.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El producto NO ha sido Modificado. Por favor intentar mas tarde'));
			}
		} else {
					$this->Producto->recursive = 1;
			$options = array('conditions' => array('Producto.' . $this->Producto->primaryKey => $id));
			$this->request->data = $this->Producto->find('first', $options);
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
		$this->Producto->id = $id;
		if (!$this->Producto->exists()) {
			throw new NotFoundException(__('Invalid producto'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Producto->delete()) {
			$this->Session->setFlash(__('El producto ha sido eliminado.'));
		} else {
			$this->Session->setFlash(__('The producto could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	public function getbymodel() {
		$model_id = 0;
		$ProdCondiciones =  "";
		if(isset($this->request->data['Ordentrabajo']['modelo_id']))
		{
			$model_id = $this->request->data['Ordentrabajo']['modelo_id'];
			$ProdCondiciones =  array('Producto.modelo_id' => $model_id, 'Producto.tipo' => 'Producto');
		}
		else 
		{
			if(isset($this->request->data['Ordentrabajo']['modelodetalle_id']))
			{
				$model_id = $this->request->data['Ordentrabajo']['modelodetalle_id'];
				$ProdCondiciones =  array('Producto.modelo_id' => $model_id, 'Producto.tipo' => 'Articulo');				
			}
			else
			{ 
				if(isset($this->request->data['Venta']['modelo_id']))
				{
					$model_id = $this->request->data['Venta']['modelo_id'];
					$ProdCondiciones =  array('Producto.modelo_id' => $model_id);
				}
			}
		}
		$productos = $this->Producto->find('list', array(
			'conditions' => $ProdCondiciones,
			'recursive' => -1
		));
		 
		$this->set('productos',$productos);
		$this->layout = 'ajax';
	}
	public function getdetalle() {
		$producto_id = 0;
		if(isset($this->request->data['Ordentrabajo']))
			$producto_id = $this->request->data['Ordentrabajo']['producto_id'];		
			$productos = $this->Producto->find('first', array(
			'conditions' => array('Producto.id' => $producto_id),
			'recursive' => -1
		));
		if(isset($this->request->data['Presupuesto']))
			$producto_id = $this->request->data['Presupuesto']['producto_id'];		
			$productos = $this->Producto->find('first', array(
			'conditions' => array('Producto.id' => $producto_id),
			'recursive' => -1
		)); 
		$this->set('productos',$productos);
		$this->layout = 'ajax';
	}
}