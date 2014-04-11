<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 3/27/14
 * Time: 6:48 PM
 * To change this template use File | Settings | File Templates.
 */

App::uses('AppController', 'Controller');


class ContactController extends AppController {

    public $helpers = array('Html', 'Form');

    public $components = array('Session');

    public $uses = array('ContactForm', 'Usuario');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('index');
    }


    public function index(){

        $this->layout = 'form';

        if ($this->request->is('post')){
            $this->ContactForm->set($this->data);
            if (($this->ContactForm->validates())){
                $adf = 234;

            }
        }




    }

}
