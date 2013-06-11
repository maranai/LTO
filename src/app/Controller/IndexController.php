<?php

class IndexController extends AppController
{
    public $name = 'Pages';
    public $layout = "index";
    public $helpers = array('Html', 'Session');

    public $uses = array('User');

    function beforeFilter(){
/*        parent::beforeFilter();
        $this->Auth->allow('help');

        $title_for_layout = 'Lto';
        $this->set(compact('title_for_layout'));*/
    }

    function index()
    {
 
    }

	function isAuthorized()
    {
        return true;
    }

	function help() {

	}
}
