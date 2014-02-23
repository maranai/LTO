<?php
App::uses('CaractSet', 'Model');

/**
 * CaractSet Test Case
 *
 */
class CaractSetTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.caract_set',
		'app.caract',
		'app.transportistum',
		'app.provincia',
		'app.canton',
		'app.prov',
		'app.distrito',
		'app.contact1',
		'app.contact2'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CaractSet = ClassRegistry::init('CaractSet');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CaractSet);

		parent::tearDown();
	}

}
