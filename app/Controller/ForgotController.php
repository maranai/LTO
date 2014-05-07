<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 3/15/14
 * Time: 9:44 PM
 * To change this template use File | Settings | File Templates.
 */

App::uses('AppController', 'Controller');

class ForgotController extends AppController {

    public $uses = array('Usuario', 'Invitacion', 'PasswordReset');
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('forgot', 'reset_password');

    }

    public function reset_password(){
        $this->layout = 'form';

        if ($this->request->is('post')){
            $this->PasswordReset->set($this->data);
            $this->set("edit_usr_id", $this->data['PasswordReset']['edit_usr_id']);
            if (($this->PasswordReset->validates())){

                $usuario = $this->Usuario->findById($this->data['PasswordReset']['edit_usr_id']);
                if (empty($usuario) == false){
                    $usuario['password'] = $this->data['PasswordReset']['rstPassword'];
                    if ($this->Usuario->save($usuario, array("password"))){
                        $this->setMessage('success', "Su contraseña fue cambiada exitosamente");
                        $this->Redirect(array('controller' => 'transport', 'action' => 'index'));
                        return;

                    } else {
                        $this->setMessage('error', "Sucedió un error inesperado al cambiar su contraseña.");
                        $this->Redirect(array('controller' => 'transport', 'action' => 'index'));
                        return;
                    }

                }
            }

        } else {
            if ($this->Session->read('Invitacion.userId') != null){
                $this->set("edit_usr_id", $this->Session->read('Invitacion.userId'));
                $this->Session->delete('Invitacion.userId');
            } else {
                $this->setMessage('error', 'Operación inválida.');
                $this->Redirect(array('controller' => 'home', 'action' => 'index'));
                return;
            }
        }

    }

    public function forgot(){

        if (!$this->request->is('post') && isset($this->params['url']['code']) &&
            isset($this->params['url']['invit'])){

            $invitacion = $this->Invitacion->findById( $this->params['url']['invit'] );

            if (empty($invitacion) == false && $this->params['url']['code'] == $invitacion['Invitacion']['codigo']){


                if (!empty($invitacion['Invitacion']['redimida_en'])){
                    $this->setMessage('error', 'El enlace utilizado ya no es válido para cambiar su clave.');
                    $this->Redirect(array('controller' => 'transport', 'action' => 'index'));
                    return;
                    //error, codigo ya redimido

                }

                $invitacion['Invitacion']['redimida_en'] = date("Y-m-d H:i:s");
                if ($this->Invitacion->save($invitacion, array("redimida_en"))){
                    // clave cambiada exitosamente
                    $this->Session->write('Invitacion.userId', $invitacion['Invitacion']['usuario_id'] );
                    $this->Redirect(array('controller' => 'forgot', 'action' => 'reset_password'));
                    return;
                } else {
                    // error cambiando clave
                    $this->Redirect(array('controller' => 'transport', 'action' => 'index'));
                    return;
                }
            }
        } else {

        }


    }

}
