<?php
/**
 * InvitacionFixture
 *
 */
class InvitacionFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'invitacion';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'codigo' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'tipo' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'creada_en' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'usuario_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'redimida_en' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_invitacion_usuario' => array('column' => 'usuario_id', 'unique' => 0)
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
			'id' => '',
			'codigo' => 'Lorem ipsum dolor sit amet',
			'tipo' => 'Lorem ipsum dolor sit amet',
			'creada_en' => '2014-03-19 19:28:12',
			'usuario_id' => '',
			'redimida_en' => '2014-03-19 19:28:12'
		),
	);

}
