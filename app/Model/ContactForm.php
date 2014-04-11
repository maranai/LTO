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
class ContactForm extends AppModel {

    var $useTable = false;

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'ctNombre' => array(
            'alphanumeric' => array(
                'rule' => 'alphaNumeric',
                'message' => 'Ups! Debe incluir su nombre en este formulario.',
                'required' => true
            )
        ),
        'ctComentario' => array(
            'alphaNumeric' => array(
                'rule'     => 'alphaNumeric',
                'required' => true,
                'message'  => 'Debe incluir su comentario o sugerencia'
            )
        ),
        'ctEmail' => array(
            'alphanumeric' => array(
                'rule' => array('email'),
                'message' => 'Indique un correo con formato válido, por ejemplo: jose.mora@fletescr.com',
                'allowEmpty' => false,
                'required' => true
            ),
        )
    );


}
