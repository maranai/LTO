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

        $algo = 234324;
    }


}

