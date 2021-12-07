<?php
App::uses('AppModel', 'Model');
/**
 * Falla Model
 *
 * @property Ordentrabajo $Ordentrabajo
 */
class Falla extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $displayField = 'codigo';

/**
 * belongsTo associations
 *
 * @var array
 */
	/*public $belongsTo = array(
		'Ordentrabajo' => array(
			'className' => 'Ordentrabajo',
			'foreignKey' => 'ordentrabajo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);*/
	public $belongsTo = array(
		'Familiaproducto' => array(
			'className' => 'Familiaproducto',
			'foreignKey' => 'familiaproducto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)		
	);
	/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Desperfecto' => array(
			'className' => 'Ordentrabajo',
			'joinTable' => 'fallas_ordentrabajos',
			'foreignKey' => 'falla_id',
			'associationForeignKey' => 'ordentrabajo_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);
}
