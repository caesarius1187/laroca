<?php
App::uses('AppModel', 'Model');
/**
 * Usuario Model
 *
 * @property Ordentrabajo $Ordentrabajo
 */
class Usuario extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed
public $displayField = 'nombre';
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ordentrabajo' => array(
			'className' => 'Ordentrabajo',
			'foreignKey' => 'usuario_id',
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
