<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 * @property Ordentrabajo $Ordentrabajo
 * @property Venta $Venta
 */
class Cliente extends AppModel {

	public $displayField = 'nombre';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Ordentrabajo' => array(
			'className' => 'Ordentrabajo',
			'foreignKey' => 'cliente_id',
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
		'Venta' => array(
			'className' => 'Venta',
			'foreignKey' => 'cliente_id',
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

	public $belongsTo = array(
		'Localidade' => array(
			'className' => 'Localidade',
			'foreignKey' => 'localidade_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
			)		
	);
	/*public $validate = array
	(        
        'nombre' => array(            
            'required' => true,
            'message' => 'El Nombre del cliente es requerido.'
        ),
        'telefono' => array(            
            'required' => true,
            'message' => 'El Telefono del cliente es requerido.'
        ),     
        'celular' => array(            
            'required' => true,
            'message' => 'El Celular del cliente es requerido.'
        ),
        'direccion' => array(            
            'required' => true,
            'message' => 'La direccion del cliente es requerida.'
        )   
    );*/

    /**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'nombre' => array(
			'rule' => 'notEmpty',
    		'required' => true
		),
		/*'telefono' => array(
			'rule' => 'notEmpty',
    		'required' => true
		),
		'celular' => array(
			'rule' => 'notEmpty',
    		'required' => true
		),*/
		'direccion' => array(
			'rule' => 'notEmpty',
    		'required' => true
		),
	);

}
