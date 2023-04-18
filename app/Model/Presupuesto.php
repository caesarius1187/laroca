<?php
App::uses('AppModel', 'Model');
/**
 * Presupuesto Model
 *
 * @property Usuario $Usuario
 * @property UsuarioRepara $UsuarioRepara
 * @property Cliente $Cliente
 * @property Tipocliente $Tipocliente
 * @property Producto $Producto
 * @property Venta $Venta
 * @property Falla $Falla
 */
class Presupuesto extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Detallepresupuesto' => array(
			'className' => 'Detallepresupuesto',
			'foreignKey' => 'presupuesto_id',
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
