<?php
App::uses('Distrito', 'Model');

/**
 * Distrito Test Case
 *
 */
class DistritoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.distrito',
		'app.canton',
		'app.prov',
		'app.transportistum'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Distrito = ClassRegistry::init('Distrito');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Distrito);

		parent::tearDown();
	}

}
