<?php

App::uses('Model','Model');
App::uses('AppModel','Model');
//App::uses('Role','Model');
App::uses('User','Model');

class SecComponent extends Component
{

    public $components = array('Session', 'Authority');

    private $userSessionKey = "Auth.User";
    //private $roleSessionKey = 'Auth.Role';


    function isLoggedIn()
    {
        $currentUser = $this->user();
        return !empty($currentUser);
    }


    function getSessionComponent(){
        return $this->Session;
    }

    function user($key = null)
    {
        $user = $this->get($this->userSessionKey, $key);
        return $user;
    }

    function clear(){
        $this->getSessionComponent()->delete($this->userSessionKey);
    }

    function get($sessionKey, $key = null){
        {
            $sessionComponent = $this->getSessionComponent();
            if (!$sessionComponent->check($sessionKey)) {
                return null;
            }

            if ($key == null) {
                return $sessionComponent->read($sessionKey);
            } else {
                $user = $sessionComponent->read($sessionKey);
                if (isset($user[$key])) {
                    return $user[$key];
                }
                return null;
            }
        }
    }

    function isUserType($userType){
        return $this->user('user_type') == $userType;
    }

    function isTeacher(){
        return $this->isUserType(User::$TEACHER);
    }
    function isStudent(){
        return $this->isUserType(User::$STUDENT);
    }
}

?>
