<?php
App::uses('AppModel', 'Model');
/**
 * Producto Model
 *
 * @property Modelo $Modelo
 * @property Proveedore $Proveedore
 * @property Detallecompra $Detallecompra
 * @property Detalleordentrabajo $Detalleordentrabajo
 * @property Detalleventa $Detalleventa
 * @property Falla $Falla
 * @property Articulos $Articulos
 */
class Producto extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'nombre';


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
			'foreignKey' => 'producto_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Detalleordentrabajo' => array(
			'className' => 'Detalleordentrabajo',
			'foreignKey' => 'producto_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Detalleordentrabajo' => array(
			'className' => 'Detalleordentrabajo',
			'foreignKey' => 'material_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Detalleventa' => array(
			'className' => 'Detalleventa',
			'foreignKey' => 'producto_id',
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


/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	/*public $hasAndBelongsToMany = array(
		
	);*/
	
	/*public $validate = array(
		'nombre' => array(
			//'notEmpty' => array(
				//'rule' => array('numeric'),
				//'message' => 'El Nombre del cliente es requerido.',
				//'allowEmpty' => false,
				//'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'preciocompra' => array(
			//'notEmpty' => array(
				'rule' => array('numeric'),
				//'message' => 'El Nombre del cliente es requerido.',
				//'allowEmpty' => false,
				'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'precioventa' => array(
			//'notEmpty' => array(
				'rule' => array('numeric'),
				//'message' => 'El Nombre del cliente es requerido.',
				//'allowEmpty' => false,
				//'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'precio' => array(
			//'notEmpty' => array(
				'rule' => array('numeric'),
				//'message' => 'El Nombre del cliente es requerido.',
				//'allowEmpty' => false,
				//'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		),
		'cantidad' => array(
			//'notEmpty' => array(
				'rule' => array('numeric'),
				//'message' => 'Campo numerico.',
				//'allowEmpty' => false,
				//'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		)		
	);*/

}
