<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public function setMessage($type, $message){
        $messages = $this->Session->read('messages');
        if ($messages == null){
          $messages = array();
        }
        array_push($messages, array('type' => $type, 'message' => $message));
        $this->Session->write('messages', $messages);
    }

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'home',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'home',
                'action' => 'index'
            )
        )
    );

    public function beforeFilter() {

        if (sizeof($this->Session->read('messages')) > 0){
            $this->set("messages", $this->Session->read('messages'));
            $this->Session->write('messages', array());
        }

        $usr = $this->Session->read('Usuario');
        if (empty($usr) == false){
            $this->set("auth_user", true);
        }

    }

    // Check if they are logged in
    function authenticate()
    {
        // Check if the session variable User exists, redirect to loginform if not
        if(!$this->Session->check('Auth.User'))
        {
            $this->redirect(array('controller' => 'home', 'action' => 'index'));
            exit();
        }
    }

    // Authenticate on every action, except the login form
    function afterFilter()
    {

        if (sizeof($this->Session->read('messages')) > 0){
            $this->set("messages", $this->Session->read('messages'));
            $this->Session->write('messages', array());
        }

        //controllers that don't need authentication
        //home
        //contact
        //transport (only home page)
        if ($this->request->controller != "home" &&
            $this->request->controller != "contact" &&
            $this->request->controller != "users" &&
            $this->request->controller != "forgot" &&
            ($this->request->controller != "usuarios" && $this->request->action != 'login') &&
            ($this->request->controller != "transport" && $this->request->action != 'index')
        ){
            $this->authenticate();

        }
    }


}
