<?php
App::uses('Caracteristica', 'Model');

/**
 * Caracteristica Test Case
 *
 */
class CaracteristicaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.caracteristica'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Caracteristica = ClassRegistry::init('Caracteristica');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Caracteristica);

		parent::tearDown();
	}

}
