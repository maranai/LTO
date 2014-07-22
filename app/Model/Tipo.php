<?php
App::uses('AppModel', 'Model');
/**
 * Tipo Model
 *
 */
class Tipo extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'tipo';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'id' => array(
            'numeric' => array(
                'rule' => array('numeric')
            ),
        ),
        'nombre' => array(
            'alphanumeric' => array(
                'rule' => array('alphanumeric')
            ),
        )
    );

}
