<?php
App::uses('AppModel', 'Model');
/**
 * Manoobraxordentrabajo Model
 *
 * @property Ordentrabajo $Ordentrabajo
 * @property Manodeobra $Manodeobra
 */
class Manoobraxordentrabajo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Ordentrabajo' => array(
			'className' => 'Ordentrabajo',
			'foreignKey' => 'ordentrabajo_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Manodeobra' => array(
			'className' => 'Manodeobra',
			'foreignKey' => 'manodeobra_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
