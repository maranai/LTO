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
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$lang='eng';
Configure::write('Config.language', $lang);

App::uses('Controller', 'Controller');
App::uses('ShareComponent', 'Controller/Component');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $helpers = array('Form', 'Html', 'Can', 'Session', 'MyDate');

    /*    public $components = array('Auth', 'Session', 'Sec',
                                   'RequestHandler', 'Cookie', 'DebugKit.Toolbar');
    */
    public $components = array('Auth', 'Session', 'Sec',
        'RequestHandler', 'Cookie');

    function beforeRender()
    {
        $this->set('sessionKey', $this->Auth->sessionKey);
        // In the views $user['User']['username'] would display the logged in users username
        $this->set(array('is_logged'=> $this->Sec->isLoggedIn()));

    }

    function beforeFilter()
    {

        $this->Auth->authenticate = array('Form' =>
        array('fields' => array(
            'username' => 'username',
            'password' => 'password'
        )));

        Security::setHash('sha256'); // or sha1 or sha256.
        $this->Auth->loginError = __("Authentication Failed");
        $this->Auth->authError = __("Access Denied");
        $this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'home');
        $this->Auth->allow('display');
        $this->Auth->authorize = array('Controller');

        ShareComponent::$secComponent = $this->Sec;

    }

    function isAuthorized()
    {
        return ($this->Sec->isLoggedIn());
    }

    function renderJson($data){
        Configure::write ( 'debug', 0 );
        $this->RequestHandler->respondAs('json');
        $this->autoRender = false;
        $encoded = json_encode ( $data );
        echo $encoded;
    }

    function renderText($data){
        Configure::write ( 'debug', 0 );
        $this->autoRender = false;
        echo $data;
    }

    function canAccess($request){
        if (!empty($request->params['pass'])){
            $entityId = $request->params['pass'][0];
            return $entityId == $this->Sec->user('id');
        }
        return false;
    }
}
