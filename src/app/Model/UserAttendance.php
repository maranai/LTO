<?php
/**
 * User: eblanco
 * Date: 4/16/13
 * Time: 10:14 AM
 */

class UserAttendance extends AppModel
{

    public $belongsTo = array('User');

    function getSessionsByUserId($userId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('UserAttendance.user_id' => $userId),
            'fields' => array ('UserAttendance.*')
        ));
        return $r;
    }

    function getAllSessions(){
        $r = $this->find('all', array(
            'recursive' => -1,
            'order' => array('UserAttendance.user_id' => 'asc')
        ));
        return $r;
    }

}

?>