<?php
/**
 * CaractSetFixture
 *
 */
class CaractSetFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'caract_set';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'caract_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_caract_set_caract_id' => array('column' => 'caract_id', 'unique' => 0)
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
			'caract_id' => ''
		),
	);

}
