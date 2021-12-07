<?php
App::uses('AppModel', 'Model');
/**
 * Detalleordentrabajo Model
 *
 * @property Producto $Producto
 * @property Ordentrabajo $Ordentrabajo
 */
class Detalleordentrabajo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'producto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Ordentrabajo' => array(
			'className' => 'Ordentrabajo',
			'foreignKey' => 'ordentrabajo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
