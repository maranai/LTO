<?php
App::uses('Flotum', 'Model');

/**
 * Flotum Test Case
 *
 */
class FlotumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.flotum',
		'app.transportista'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Flotum = ClassRegistry::init('Flotum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Flotum);

		parent::tearDown();
	}

}
