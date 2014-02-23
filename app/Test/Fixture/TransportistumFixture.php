<?php
/**
 * TransportistumFixture
 *
 */
class TransportistumFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'nombre' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'provincia_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'index'),
		'canton_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'index'),
		'distrito_id' => array('type' => 'biginteger', 'null' => true, 'default' => null, 'key' => 'index'),
		'direccion' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'telefono' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 30, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'cod_postal' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'contact1_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'contact2_id' => array('type' => 'biginteger', 'null' => true, 'default' => null),
		'caract_set_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_transportist_contact2_user_id' => array('column' => 'contact1_id', 'unique' => 0),
			'fk_transportist_canton_id_canton_id' => array('column' => 'canton_id', 'unique' => 0),
			'fk_transportist_state_id_state_id' => array('column' => 'provincia_id', 'unique' => 0),
			'fk_transportist_district_id_district_id' => array('column' => 'distrito_id', 'unique' => 0),
			'fk_transportist_caract_set_id_caract' => array('column' => 'caract_set_id', 'unique' => 0)
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
			'provincia_id' => '',
			'canton_id' => '',
			'distrito_id' => '',
			'direccion' => 'Lorem ipsum dolor sit amet',
			'telefono' => 'Lorem ipsum dolor sit amet',
			'cod_postal' => 'Lorem ip',
			'contact1_id' => '',
			'contact2_id' => '',
			'caract_set_id' => ''
		),
	);

}
