<?php
App::uses('AppModel', 'Model');
/**
 * Compra Model
 *
 * @property Proveedor $Proveedor
 * @property Detallecompra $Detallecompra
 */
class Compra extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	/*public $belongsTo = array(
		
	);*/

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Detallecompra' => array(
			'className' => 'Detallecompra',
			'foreignKey' => 'compra_id',
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

	//public $validate = array(
	//	'numerocomprobante' => array(
			//'notEmpty' => array(
				//'rule' => array('numeric'),
				//'message' => 'El Nombre del cliente es requerido.',
				//'allowEmpty' => false,
	//			'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
	//	),
	//	'total' => array(
			//'notEmpty' => array(
				//'rule' => array('numeric'),
				//'message' => 'El Nombre del cliente es requerido.',
				//'allowEmpty' => false,
	//			'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
	//	)
	//);

}
