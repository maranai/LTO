<?php
/**
 * ProvinciumFixture
 *
 */
class ProvinciumFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 85, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'pais_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'codigo' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 8, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_provincia_pais' => array('column' => 'pais_id', 'unique' => 0)
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
			'pais_id' => '',
			'codigo' => 'Lorem '
		),
	);

}
