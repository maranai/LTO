<?php
/**
 * CantonFixture
 *
 */
class CantonFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'canton';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 85, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'prov_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_canton_provincia' => array('column' => 'prov_id', 'unique' => 0)
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
			'nombre' => 'Lorem ipsum dolor sit amet',
			'prov_id' => ''
		),
	);

}
