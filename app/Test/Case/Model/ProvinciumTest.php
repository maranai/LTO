<?php
App::uses('Provincium', 'Model');

/**
 * Provincium Test Case
 *
 */
class ProvinciumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.provincium',
		'app.pais'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Provincium = ClassRegistry::init('Provincium');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Provincium);

		parent::tearDown();
	}

}
