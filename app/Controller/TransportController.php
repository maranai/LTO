<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 */
class TransportController extends AppController {


    var $helpers = array('Form');

    public function beforeFilter(){
        parent::beforeFilter();

        // Allow users to register and logout.
        $this->Auth->allow('index');

    }

    public function index() {

        if ($this->request->is('post')){

        } else {
            if (isset ($this->params['url']['emailConf'])){
                $this->set('emailSent', 1);
            }
            if (isset ($this->params['url']['usrNotFound'])){
                $this->set('usrNotFound', 1);
            }
            if (isset ($this->params['url']['emailError'])){
                $this->set('emailError', 1);
            }
        }
    }

}