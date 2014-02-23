<?php
/**
 * CargaFixture
 *
 */
class CargaFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'carga';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'distrito_origen_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'descripcion' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'canton_origen_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'distrito_destino_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'canton_destino_id' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'index'),
		'dir_origen' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'propietario_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'dir_destino' => array('type' => 'string', 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'set_caract_id' => array('type' => 'biginteger', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_carga_canton_origen' => array('column' => 'canton_origen_id', 'unique' => 0),
			'fk_carga_canton_destino' => array('column' => 'canton_destino_id', 'unique' => 0),
			'fk_carga_distrito_origen' => array('column' => 'distrito_origen_id', 'unique' => 0),
			'fk_carga_distrito_destino' => array('column' => 'distrito_destino_id', 'unique' => 0)
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
			'distrito_origen_id' => '',
			'descripcion' => 'Lorem ipsum dolor sit amet',
			'canton_origen_id' => '',
			'distrito_destino_id' => '',
			'canton_destino_id' => '',
			'dir_origen' => 'Lorem ipsum dolor sit amet',
			'propietario_id' => '',
			'dir_destino' => 'Lorem ipsum dolor sit amet',
			'set_caract_id' => ''
		),
	);

}
