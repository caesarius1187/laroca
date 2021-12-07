<?php
App::uses('AppModel', 'Model');
/**
 * Estadosordentrabajo Model
 *
 * @property Ordentrabajo $Ordentrabajo
 * @property Manodeobra $Manodeobra
 */
class Estadosordentrabajo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $displayField = 'estado';

	public $belongsTo = array(
		'Ordentrabajo' => array(
			'className' => 'Ordentrabajo',
			'foreignKey' => 'ordentrabajo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}