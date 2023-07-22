<?php
App::uses('AppController', 'Controller');
/**
 * Clientes Controller
 *
 * @property Cliente $Cliente
 * @property PaginatorComponent $Paginator
 */
class CajasController extends AppController {

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
	public function index() 
	{
		$this->set('cajas', $this->Caja->find('all'));
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
			$this->Caja->create();
			$this->request->data['Caja']['usuarioApertura_id'] = $this->Session->read('Auth.User.id');
			$dt = new DateTime();
			$dt->setTimezone(new DateTimeZone('America/Buenos_Aires'));
			$this->request->data['Caja']['fecha'] = $dt->format('Y-m-d');
			$this->request->data['Caja']['horaApertura'] = $dt->format('H:i:s');
			if ($this->Caja->save($this->request->data)) {
				$this->Session->setFlash(__('La Caja ha sido abierta.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				//debug($this->Cliente->invalidFields());
				$this->Session->setFlash(__('No se pudo abrir la caja. Por favor intente de nuevo pas tarde'));
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
		$this->loadModel("Pago");
		$this->loadModel("Compras");
		if (!$this->Caja->exists($id)) {
			throw new NotFoundException(__('Invalid cliente'));
		}
		if ($this->request->is('put')) {
			$this->request->data['Caja']['usuarioCierre_id'] = $this->Session->read('Auth.User.id');
			$dt = new DateTime();
			$this->request->data['Caja']['horaCierre'] = $dt->format('H:i:s');
			if ($this->Caja->save($this->request->data)) {
				$this->Session->setFlash(__('La caja ha sido modificada.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La caja no se pudo modificar, por favor intente de nuevo mas tarde.'));
			}
		} else {
			$options = ['conditions' => ['Caja.' . $this->Caja->primaryKey => $id]];
			$this->request->data = $this->Caja->find('first', $options);

			$dt = new DateTime($this->request->data['Caja']['fecha']." ".$this->request->data['Caja']['horaApertura']);
			$dc = new DateTime($this->request->data['Caja']['fecha']." ".$this->request->data['Caja']['horaApertura'].' +3 hours');
			
			$optionsPagos = ['conditions' => [
				'Pago.fecha >= '=> $dt->format('Y-m-d H:i:s'),
				'Pago.mediodepago' => 'efectivo'
				]];
			
			$optionsCompras = ['conditions' => [
				'Compras.created >= '=> $dc->format('Y-m-d H:i:s'),
				'Compras.mediodepago' => 'efectivo'
				]];
			
			if($this->request->data['Caja']['usuarioCierre_id']){
				$hc = new DateTime($this->request->data['Caja']['fecha']." ".$this->request->data['Caja']['horaCierre'].' -3 hours');
				$optionsPagos['conditions']['Pago.fecha <= '] = $hc->format('Y-m-d H:i:s');
				$hg = new DateTime($this->request->data['Caja']['fecha']." ".$this->request->data['Caja']['horaCierre'].' +3 hours');
				$optionsCompras['conditions']['Compras.created <= '] = $hg->format('Y-m-d H:i:s');
			}	
			$this->set('pagos', $this->Pago->find('all', $optionsPagos));
			$this->set('compras', $this->Compras->find('all', $optionsCompras));

		}
	}

	public function movimientos() 
	{
		$this->loadModel("Pago");
		$this->loadModel("Compras");
		
		if ($this->request->is('post')) {
			$desde = $this->request->data['Caja']['desde'];
			$hasta = $this->request->data['Caja']['hasta'];
		}else{
			$desde = null;
			$hasta = null;
		}
		if($desde == null){
			$fd = new DateTime('-1 Months');
		}else{
			$fd = new DateTime($desde);
		}
		
		if($hasta == null){
			$fh = new DateTime('2030-12-23');
		}else{
			$fh = new DateTime($hasta);
		}

		$optionsPagos = [
			'conditions' => [
				'Pago.fecha >= '=> $fd->format('Y-m-d H:i:s'),
				'Pago.fecha <= '=> $fh->format('Y-m-d H:i:s'),				
			],
			'order'=>[
				'Pago.mediodepago','Pago.fecha'
			]
		];
		
		$optionsCompras = [
			'conditions' => [
				'Compras.created >= '=> $fd->format('Y-m-d H:i:s'),
				'Compras.created <= '=> $fh->format('Y-m-d H:i:s'),
			],
			'order'=>[
				'Compras.mediodepago','Compras.created'
			]
		];
		
		$this->set('pagos', $this->Pago->find('all', $optionsPagos));
		$this->set('compras', $this->Compras->find('all', $optionsCompras));

		$this->set('desde', $fd->format('Y-m-d H:i:s'));
		$this->set('hasta', $fh->format('Y-m-d H:i:s'));
		

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
	//	$this->Cliente->id = $id;
	//	if (!$this->Cliente->exists()) {
	//		throw new NotFoundException(__('Invalid cliente'));
	//	}
	//	$this->request->onlyAllow('post', 'delete');
	//	if ($this->Cliente->delete()) {
	//		$this->Session->setFlash(__('El cliente ha sido eliminado.'));
	//	} else {
	//		$this->Session->setFlash(__('The cliente could not be deleted. Please, try again.'));
	//	}
	//	return $this->redirect(array('action' => 'index'));
	}
}
