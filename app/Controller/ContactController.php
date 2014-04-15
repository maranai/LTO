<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 3/27/14
 * Time: 6:48 PM
 * To change this template use File | Settings | File Templates.
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


class ContactController extends AppController {

    public $helpers = array('Html', 'Form');

    public $components = array('Session');

    public $uses = array('ContactForm', 'Usuario');

    public function beforeFilter(){
        parent::beforeFilter();

        // Allow users to register and logout.
        $this->Auth->allow('index', 'msg_enviado');

    }

    public function msg_enviado(){
        $this->layout = 'form';

    }


    public function index(){

        $this->layout = 'form';

        if ($this->request->is('post')){
            $this->ContactForm->set($this->data);
            if (($this->ContactForm->validates())){
                $email = new CakeEmail('gmail');
                $email->viewVars(array("nombre" => $this->data['ContactForm']['ctNombre'],
                    "mensaje" => $this->data['ContactForm']['ctComentario'],
                    "email" => $this->data['ContactForm']['ctEmail'],
                    "telefono" => $this->data['ContactForm']['ctTelefono']));
                $email->template('contactenos');
                $email->emailFormat('html');
                $email->from('admin@fletescr.com');
                $email->to('admin@fletescr.com');
                $email->subject('Mensaje enviado a través de fletescr.com');
                $email->send();

                $this->Redirect(array('controller' => 'contact', 'action' => 'msg_enviado'));
                exit();

            }
        }
    }

}
