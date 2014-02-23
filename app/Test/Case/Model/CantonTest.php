<?php
App::uses('Canton', 'Model');

/**
 * Canton Test Case
 *
 */
class CantonTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.canton',
		'app.prov',
		'app.distrito',
		'app.transportistum'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Canton = ClassRegistry::init('Canton');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Canton);

		parent::tearDown();
	}

}
