<?php
App::uses('AppModel', 'Model');
/**
 * Detalleordentrabajo Model
 *
 * @property Producto $Producto
 * @property Presupuesto $Presupuesto
 */
class Detallepresupuesto extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Producto' => array(
			'className' => 'Producto',
			'foreignKey' => 'producto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Material' => array(
			'className' => 'Producto',
			'foreignKey' => 'material_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Presupuesto' => array(
			'className' => 'Presupuesto',
			'foreignKey' => 'presupuesto_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
