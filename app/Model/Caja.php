<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 * @property Ordentrabajo $Ordentrabajo
 * @property Venta $Venta
 */
class Caja extends AppModel {


/**
 * hasMany associations
 *
 * @var array
 */

	public $belongsTo = array(
		'UserApertura' => array(
			'className' => 'User',
			'foreignKey' => 'usuarioApertura_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'UserCierre' => array(
			'className' => 'User',
			'foreignKey' => 'usuarioCierre_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			)				
	);
	
}
