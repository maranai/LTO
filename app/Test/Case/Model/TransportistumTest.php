<?php
App::uses('Transportistum', 'Model');

/**
 * Transportistum Test Case
 *
 */
class TransportistumTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.transportistum',
		'app.provincia',
		'app.canton',
		'app.prov',
		'app.distrito',
		'app.contact1',
		'app.contact2',
		'app.caract_set'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Transportistum = ClassRegistry::init('Transportistum');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Transportistum);

		parent::tearDown();
	}

}
