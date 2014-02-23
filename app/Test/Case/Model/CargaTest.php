<?php
App::uses('Carga', 'Model');

/**
 * Carga Test Case
 *
 */
class CargaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.carga',
		'app.distrito_origen',
		'app.canton_origen',
		'app.distrito_destino',
		'app.canton_destino',
		'app.propietario',
		'app.set_caract'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Carga = ClassRegistry::init('Carga');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Carga);

		parent::tearDown();
	}

}
