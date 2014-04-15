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

    public $uses = array('Usuario', 'Invitacion');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('forgot', 'reset_password');

    }

    public function reset_password(){
        $this->layout = 'form';

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
                if ($this->Invitacion->save($invitacion, array("codigo", "redimida_en"))){
                    // clave cambiada exitosamente
                    $this->Redirect(array('controller' => 'forgot', 'action' => 'reset_password'));
                    return;
                } else {
                    // error cambiando clave
                    $this->Redirect(array('controller' => 'transport', 'action' => 'index'));
                    return;
                }
            }
        }


    }

}
