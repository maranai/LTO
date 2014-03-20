<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 3/15/14
 * Time: 9:44 PM
 * To change this template use File | Settings | File Templates.
 */
class ForgotController extends AppController {

    public $uses = array('Usuario', 'Invitacion');

    public function forgot(){

        if (!$this->request->is('post') && isset($this->params['url']['usrNotFound'])){

        }
        $asdfasdf = 234;
    }

}
