<?php
App::uses('Invitacion', 'Model');

/**
 * Invitacion Test Case
 *
 */
class InvitacionTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.invitacion',
		'app.usuario',
		'app.rol',
		'app.usuario_rol'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Invitacion = ClassRegistry::init('Invitacion');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Invitacion);

		parent::tearDown();
	}

}
