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

    public $uses = array('Usuario', 'Rol', 'RolesUsuario', 'Carga', 'Provincia', 'Canton', 'Distrito', 'Tipo');
    public $helpers = array('Html', 'Form', 'Js' => array('Jquery'));
    public $components = array('Session', 'RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('index',
            'usuarios', 'addUsuario', 'deleteUsuario',
            'cargas', 'cargasEliminadas', 'deleteCarga', 'restoreCarga', 'addCarga', 'addTipoCarga');

    }

    function provincias() {
        $this->set('provincias', $this->Provincia->find('list'));
    }

    function cantones() {
        $this->set('cantones', $this->Canton->find('list'));
    }


    function admTiposCarga(){
        if (!$this->request->is('post')) {
            $tiposCarga = $this->Tipo->find('all', array(
                'conditions' => array('Tipo.mostrar' => 1)
            ));
            $this->set('tiposCarga', $tiposCarga);
        }
    }

    function ajax_cantones($provincia = null) {
        // Fill select form field after Ajax request.
        $this->set('options',
            $this->Canton->find('list',
                array(
                    'conditions' => array(
                        'Canton.prov_id' => $provincia
                    ),
                    'fields' => array("Canton.id", "Canton.nombre")
                )
            )
        );

        $this->render('/elements/ajax_dropdown');

    }

    function ajax_distritos($canton = null) {
        // Fill select form field after Ajax request.
        $this->set('options',
            $this->Distrito->find('list',
                array(
                    'conditions' => array(
                        'Distrito.canton_id' => $canton
                    ),
                    'fields' => array("Distrito.id", "Distrito.nombre")
                )
            )
        );

        $this->render('/elements/ajax_dropdown');
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

    public function cargasEliminadas(){
        if (!$this->request->is('post')) {
            $cargas = $this->Carga->find('all',
                array('conditions' => array('Carga.eliminada' => 1) ));
            $this->set('cargas', $cargas);
        }
    }

    public function addTipoCarga() {
        if ($this->request->is('post')) {
            $this->Tipo->create();
            if ($this->Tipo->save($this->request->data)) {
                $this->setMessage('success', 'El tipo de carga fue creado exitosamente');
            } else {
                $this->setMessage('error', 'El tipo de carga no pudo ser creado');
            }
            return $this->redirect(array('action' => 'admTiposCarga'));
        }
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

    public function restoreCarga($id = null){
        $this->Carga->id = $id;

        if (!$this->Carga->exists()) {
            $this->setMessage('error', "La carga no existe. Por favor intente de nuevo.");
        } else {
            if ($this->Carga->id) {
                $this->Carga->saveField('eliminada', 0);
            }
            $this->setMessage('success', "La carga fue restaurada exitosamente.");
        }
        return $this->redirect(array('action' => 'cargasEliminadas'));
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

    public function addCarga(){

        $provincias = $this->Provincia->find('list', array(
            'fields'     => array('Provincia.id', 'Provincia.nombre')
        ));
        $this->set(compact('provincias'));

        $tiposCarga = $this->Tipo->find('list', array(
            'conditions' => array('Tipo.mostrar' => 1),
            'fields'     => array('Tipo.id', 'Tipo.tipo')
        ));
        $this->set(compact('tiposCarga'));

        if ($this->request->is('post')) {

            $data = $this->request->data;

            $this->Carga->create();

            if ($data['Carga']['tipo_id'] == 11){
                $tipo = array();
                $tipo['Tipo']['tipo'] = $data['Tipo']['tipo'];
                $this->Tipo->create();
                $id = $this->Tipo->save($tipo);
                $data['Carga']['tipo_id'] = $id['Tipo']['id'];
            }


            if ($this->Carga->save($data['Carga'])){
                $this->setMessage('success', "La carga fue creada exitosamente.");
                return $this->redirect(array('action' => 'cargas'));
            } else {
                $this->setMessage('error', "La carga no pudo ser creada.");
                return $this->redirect(array('action' => 'addCarga'));
            }



        }
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
                $this->setMessage('success', "El usuario fue creado exitosamente.");
                return $this->redirect(array('action' => 'usuarios'));
            } else {
                $this->setMessage('error', "El usuario no pudo ser creado.");
            }
        }
    }


}