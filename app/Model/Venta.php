<?php
App::uses('AppModel', 'Model');
/**
 * Venta Model
 *
 * @property Cliente $Cliente
 * @property Ordendetrabajo $Ordendetrabajo
 * @property Detalleventa $Detalleventa
 */
class Venta extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)		
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Detalleventa' => array(
			'className' => 'Detalleventa',
			'foreignKey' => 'venta_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
