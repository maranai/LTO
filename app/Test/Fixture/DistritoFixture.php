<?php
/**
 * DistritoFixture
 *
 */
class DistritoFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'distrito';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 85, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'canton_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'cod_postal' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_distrito_canton' => array('column' => 'canton_id', 'unique' => 0)
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
			'canton_id' => '',
			'cod_postal' => 'Lorem '
		),
	);

}
