<?php
App::uses('AppModel', 'Model');


class Tipocliente extends AppModel {

	public $displayField = 'tipo';

	public $hasMany = array(
		
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
