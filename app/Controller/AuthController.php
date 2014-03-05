<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 2/24/14
 * Time: 10:05 PM
 * To change this template use File | Settings | File Templates.
 */

class AuthController extends AppController {
    var $name 		= 'Auth';
    var $uses 		= array('Usuario');



    function beforeFilter()
    {
        parent::beforeFilter();
    }

    function login() {

        if (isset($_POST['btnSubmit'])) {
            $email = $_POST['lgnEmail'];
            $pass = $_POST['lgnPassword'];


            // Here we validate the user by calling that method from the User model
            if((Usuario::validateLogin($email, $pass)) != false)
            {
                // Write some Session variables and redirect to our next page!
                $this->Session->setFlash('Thank you for logging in!');
                $this->Session->write('User', $user);

                // Go to our first destination!
                $this->Redirect(array('controller' => 'Controller_name', 'action' => 'Action_name'));
                exit();
            }
            else
            {
                $this->Session->setFlash('Incorrect username/password!', true);
                $this->Redirect(array('action' => 'login_form'));
                exit();
            }
        }
    }

    function logout() {

        $this->Session->destroy();
        $this->Session->setFlash('You have been logged out!');

        // Go home!
        $this->Redirect('/');
        exit();
    }



    function index() {
//            $this->layout = 'login';

        if (isset($_POST['btnSubmit'])) {
//            $email = $_POST['lgnEmail'];
//            $pass = $_POST['lgnPassword'];
////                $pass = $this->Encrypt->encrypt($pass);
////
//            $countUsers = $this->Usuario->find('count', array('conditions' => array('Usuario.email' => $email, 'Usuario.password' => $pass)));
////
//            if ($countUsers > 0) {
//                $user = $this->Usuario->find('first', array('fields' => array('Usuario.id', 'Usuario.email'), 'conditions' => array('Usuario.email' => $email), 'recursive' => 0));
//                $this->Session->write('User', $user);

//                    $roles = $this->Role->find('all', array('fields' => array('Role.section_id'), 'conditions' => array('Role.user_id' => $user['User']['id']),'order'=>array('Role.section_id')));

//                    if($user['User']['id']=='1'){//Admin User
//
//                        $sections = $this->Section->find('all', array('conditions' => array('Section.enabled' => 1),'order'=>array('Section.title')));
//                        //debug($this->Session->read());
//                        // die();
//
//                    }else{
//                        $allSections = $this->Section->find('all', array('conditions' => array('Section.enabled' => 1),'order'=>array('Section.title')));
//                        $roles = $this->Role->find('all', array('fields' => array('Role.section_id'), 'conditions' => array('Role.user_id' => $user['User']['id']),'order'=>array('Role.section_id')));
//
//                        $x=0;
//                        $sections=array();
//
//                        foreach($allSections as $section){
//
//                            foreach($roles as $role){
//
//                                if ($role['Role']['section_id']== $section['Section']['id']){
//                                    $seccion=$this->Section->find('first', array('conditions' => array('Section.enabled' => 1,'Section.id'=>$role['Role']['section_id'])));
//                                    $sections[$x]=$seccion;
//                                }
//                                $x++;
//                            }
//                        }
//
//                    }

//                    $this->Session->write('Role', $roles);
//                    $this->Session->write('Sections', $sections);

//                $this->redirect(array('controller' => 'home', 'action' => 'index'));
//            } else {
//                $this->set('logError', true);
////                    $this->redirect(array('controller' => 'auth', 'action' => 'index'));
//            }
        }

    }

//        function wpanel_isAValidWpanelUser($userId, $userLogin)
//        {
//            $countUsers = $this->User->find('count', array('conditions' => array('User.id' => $userId, 'User.login' => $userLogin, 'User.enabled' => 1)));
//
//            if ($countUsers > 0)
//            {
//                return true;
//            } else {
//                return false;
//            }
//        }

//        function wpanel_logout()
//        {
//            $this->layout = 'blank';
//            $this->Session->destroy();
//            $this->redirect(array('controller' => 'auth', 'action' => 'index'));
//        }

}

