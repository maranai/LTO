<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 */
class TransportController extends AppController {


    var $helpers = array('Form');

//    function login_form() {
//        $asd = 'sdf';
//    }

    public function index() {

        if ($this->request->is('post')){

        } else {
            if (isset ($this->params['url']['emailConf'])){
                $this->set('emailSent', 1);
            }
        }
    }

}