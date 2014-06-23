<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 3/15/14
 * Time: 9:44 PM
 * To change this template use File | Settings | File Templates.
 */

App::uses('AppController', 'Controller');

class AdminController extends AppController
{

    public $uses = array('Usuario', 'UsuarioRol', 'Rol');
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function beforeFilter()
    {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('index', 'usuarios', 'fletes', 'cargas', 'addUsuario');

    }

    public function index()
    {

    }

    public function usuarios()
    {

        if (!$this->request->is('post')) {
            $usuarios = $this->Usuario->find('all');
            $this->set('usuarios', $usuarios);
        }


    }

    public function fletes()
    {

    }

    public function cargas()
    {

    }

    public function addUsuario()
    {

        if ($this->request->is('post')) {

            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)) {
                $roles = $this->request->data['Usuario']['Rol']['id'];

                $roles = $this->Rol->find('all', array(
                'conditions' => array( "Rol.id" => $roles)
                ));

                $this->Usuario->UsuarioRol = $roles;
                $this->Usuario->save();




//                $this->set('usuarios', $usuarios);

//                for ($i = 0; $i < sizeof($roles); $i++) {
//                    $usuario_rol = $this->UsuarioRol->create();
//                    $usuario_rol['usuario_id'] = $this->Usuario->id;
//                    $usuario_rol['rol_id'] = $roles[$i];
//                    $this->UsuarioRol->save($usuario_rol);
//                }
                $this->Session->setFlash(__('The usuario has been saved.'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
            }
        } else {

        }

    }


}