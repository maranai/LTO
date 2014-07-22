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

    public $uses = array('Usuario', 'Rol', 'RolesUsuario', 'Carga');
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function beforeFilter()
    {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('index', 'usuarios', 'fletes', 'cargas', 'addUsuario', 'deleteUsuario');

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

    public function deleteCarga($id = null){
        $this->Carga->id = $id;

        if (!$this->Carga->exists()) {
            $this->setMessage('error', "La carga no existe. Por favor intente de nuevo.");
        } else {
            if ($this->Carga->id) {
                $this->Carga->saveField('eliminada', 1);
            }
            $this->setMessage('success', "La carga fue borrada exitosamente.");
        }
        return $this->redirect(array('action' => 'cargas'));
    }

    public function cargas()
    {
        if (!$this->request->is('post')) {
            $cargas = $this->Carga->find('all',
                array('conditions' => array('Carga.eliminada' => 0) ));
            $this->set('cargas', $cargas);
        }
    }

    public function deleteUsuario($id = null) {
    $this->Usuario->id = $id;
    if (!$this->Usuario->exists()) {
        throw new NotFoundException(__('Invalid usuario'));
    }

    if ($this->Usuario->delete()) {
        $this->setMessage('success', "El usuario fue borrado exitosamente.");
//        $this->Session->setFlash(__('The usuario has been deleted.'));
    } else {
        $this->setMessage('error', "El usuario no pudo ser borrado.");
//        $this->Session->setFlash(__('The usuario could not be deleted. Please, try again.'));
    }
        return $this->redirect(array('action' => 'usuarios'));
}

    public function addUsuario()
    {

        if ($this->request->is('post')) {

            $userRoles = array();
            for ($i = 0; $i < sizeof($this->request->data['Rol']['Rol']); $i++) {
                $userRoles[$i]['rol_id'] = $this->request->data['Rol']['Rol'][$i];
            }

            $this->request->data['RolesUsuario'] = $userRoles;
            $this->Usuario->create();
            if ($this->Usuario->save($this->request->data)){
//                $this->Session->setFlash(__('The user has been saved.'));
                $this->setMessage('success', "El usuario fue creado exitosamente.");
                return $this->redirect(array('action' => 'usuarios'));
            } else {
                $this->setMessage('error', "El usuario no pudo ser creado.");
//                $this->Session->setFlash(__('The usuario could not be saved. Please, try again.'));
            }
        }
    }


}