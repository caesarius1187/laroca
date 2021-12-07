<?php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');
/**
 * Usuario Model
 *
 * @property Ordentrabajo $Ordentrabajo
 */
class User extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed
	public $displayField = 'nombre';
/**
 * hasMany associations
 *
 * @var array
 */
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'El nombre de usuario es requerido.'
            ),
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'La contraseña es requerida.'
            ),
        ),
        'tipo' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'vendedor')),
                'message' => 'Por favor, ingrese un rol válido.',
                'allowEmpty' => false
            ),
        ),
    );


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

    public function beforeSave($options = array()) {
        // hash our password
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return parent::beforeSave($options);
    }
}
