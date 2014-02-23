<?php
App::uses('UsuarioRol', 'Model');

/**
 * UsuarioRol Test Case
 *
 */
class UsuarioRolTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.usuario_rol',
		'app.usuario',
		'app.rol'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->UsuarioRol = ClassRegistry::init('UsuarioRol');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->UsuarioRol);

		parent::tearDown();
	}

}
