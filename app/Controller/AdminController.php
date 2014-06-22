<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 3/15/14
 * Time: 9:44 PM
 * To change this template use File | Settings | File Templates.
 */

App::uses('AppController', 'Controller');

class AdminController extends AppController {

    public $uses = array('Usuario');
    public $helpers = array('Html', 'Form');
    public $components = array('Session');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('usuarios', 'transportistas');

    }

    public function index(){

    }



}