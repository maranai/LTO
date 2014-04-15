<?php
App::uses('AppModel', 'Model');
/**
 * Dummy Model created for the contact form
 *
 * @property DistritoOrigen $DistritoOrigen
 * @property CantonOrigen $CantonOrigen
 * @property DistritoDestino $DistritoDestino
 * @property CantonDestino $CantonDestino
 * @property Propietario $Propietario
 * @property SetCaract $SetCaract
 */
class PasswordReset extends AppModel {

    var $useTable = false;

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'rstPassword' => array(
            'alphanumeric' => array(
                'rule' => 'alphaNumeric',
                'message' => 'La contraseña puede contener letras y números',
                'required' => true
            ),
            "notEmpty"  => array(
                "rule"          => "notEmpty",
                "message"       => "Debe digitar su nueva contraseña",
            ),
        ),
        'rstPassword2' => array(
            'alphanumeric' => array(
                'rule' => 'alphaNumeric',
                'message' => 'La contraseña puede contener letras y números',
                'required' => true
            ),
            "notEmpty"  => array(
                "rule"          => "notEmpty",
                "message"       => "Debe reconfirmar su contraseña",
            ),
        ),
    );


}
