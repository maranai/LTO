<?php
/**
 * UsuarioRolFixture
 *
 */
class UsuarioRolFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'usuario_rol';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'usuario_id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'key' => 'primary'),
		'rol_id' => array('type' => 'biginteger', 'null' => false, 'default' => '0', 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('usuario_id', 'rol_id'), 'unique' => 1),
			'users_roles_userFK' => array('column' => 'usuario_id', 'unique' => 0),
			'fk_usuario_rol_rol_id' => array('column' => 'rol_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'usuario_id' => '',
			'rol_id' => ''
		),
	);

}
