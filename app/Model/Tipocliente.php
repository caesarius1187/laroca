<?php
App::uses('AppModel', 'Model');


class Tipocliente extends AppModel {

	public $displayField = 'tipo';

	public $hasMany = array(
		'Ordentrabajo' => array(
			'className' => 'Ordentrabajo',
			'foreignKey' => 'tipocliente_id',
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

	public $validate = array(		
		'tipo' => array(
			//'notEmpty' => array(
				//'rule' => array('numeric'),
				//'message' => 'Campo requerido.',
				//'allowEmpty' => false,
				'required' => true
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			//),
		)		
	);
}
