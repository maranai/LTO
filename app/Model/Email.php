<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 3/16/14
 * Time: 12:00 AM
 * To change this template use File | Settings | File Templates.
 */
class Email extends AppModel
{
    var $useTable = false;

    public $validate = array(
        'email' => array(
            'alphanumeric' => array(
            'rule' => 'email',
                'message' => 'Por favor ingrese un email válido'
            )
        )
    );


}
