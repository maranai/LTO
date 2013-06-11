<?php

App::uses('ShareComponent', 'Controller/Component');
class CanHelper extends AppHelper
{


    function isLoggedIn()
    {
        return $this->getSecComponent()->isLoggedIn();
    }

    function getSecComponent(){
        return ShareComponent::$secComponent;
    }

    /*
     * Access logged user's information
     *
     */
    function user($key=null){
        return $this->getSecComponent()->user($key);
    }

    /*
     * Access logged user role's information
     *
     */
    function role($key=null){
        return $this->getSecComponent()->role($key);
    }

    function can($authorities, $option = 'all'){
        return $this->getSecComponent()->can($authorities, $option);
    }


}

?>
