<?php
App::uses('AppModel', 'Model');
/**
 * Ordentrabajo Model
 *
 * @property Usuario $Usuario
 * @property UsuarioRepara $UsuarioRepara
 * @property Cliente $Cliente
 * @property Producto $Producto
 * @property Venta $Venta
 * @property Falla $Falla
 */
class Ordentrabajo extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'numerodeorden';

	public $validate = array(
		'usuario_repara_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)/*,
		'costo' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'El monto insertado no es un valor numerico',
				//'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),*/
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Prepara' => array(
			'className' => 'User',
			'foreignKey' => 'preparada',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
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
		'Detalleordentrabajo' => array(
			'className' => 'Detalleordentrabajo',
			'foreignKey' => 'ordentrabajo_id',
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
		'Manoobraxordentrabajo' => array(
			'className' => 'Manoobraxordentrabajo',
			'foreignKey' => 'ordentrabajo_id',
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
		'Pago' => array(
			'className' => 'Pago',
			'foreignKey' => 'ordentrabajo_id',
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
		'Observacione' => array(
			'className' => 'Observacione',
			'foreignKey' => 'ordentrabajo_id',
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

}
