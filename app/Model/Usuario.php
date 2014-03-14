<?php
/**
 * Usuario Model
 *
 * @property Rol $Rol
 */
class Usuario extends AppModel {


    /**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'usuario';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'alphanumeric' => array(
                'required' => array(
                    'rule' => array('notEmpty'),
                    'message' => 'A password is required'
                )
			),
			'maxlength' => array(
				'rule' => array('maxlength'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'apellido1' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'An email is required',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email2' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => true,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'telefono' => array(
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				//'message' => 'Your custom message here',
				'allowEmpty' => false,
				'required' => true,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'telefono2' => array(
			'phone' => array(
				'rule' => array('phone'),
				//'message' => 'Your custom message here',
//				'allowEmpty' => true,
				'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


    public function findByEmail($email){
        $usuario =  $this->find('first', array('recursive' => '-1', 'conditions' => array('Usuario.email' => $email)));
        return $usuario['Usuario'];
    }

    public function findById($userId){
        $usuario = $this->find('first', array('recursive' => '-1', 'conditions' => array('Usuario.id' => $userId)));
        return $usuario['Usuario'];
    }





	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Rol' => array(
			'className' => 'Rol',
			'joinTable' => 'usuario_rol',
			'foreignKey' => 'usuario_id',
			'associationForeignKey' => 'rol_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

    function validateLogin($data)
    {
        // Search our database where the 'username' field is equal to our form input.
        // Same with the password (this example uses PLAIN TEXT passwords, you should encrypt yours!)
        // The second parameter tells us which fields to return from the database
        // Here is the corresponding query:
        // "SELECT id, username FROM users WHERE username = 'xxx' AND password = 'yyy'"
//        $user = $this->find(array('email' => $data['email'], 'password' => $data['password']), array('id', 'email'));

        $user = $this->find('first', array('fields' => array('Usuario.id', 'Usuario.email'),
            'conditions' => array('Usuario.email' => $data['lgnEmail'], 'Usuario.password' => $data['lgnPassword'],), 'recursive' => 0));


        if( empty($user) == false )
        {
            return $user;
        }

        return false;
    }

}
