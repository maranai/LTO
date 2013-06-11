<?php
/**
 * User: eblanco
 * Date: 5/9/13
 * Time: 1:52 PM
 */

class UserAttendanceChild extends AppModel
{

    public $belongsTo = array('UserAttendance', 'Child');

    function getByUserAttendanceId($userAttendanceId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('UserAttendanceChild.user_attendance_id' => $userAttendanceId),
            'fields' => array ('UserAttendanceChild.*')
        ));
        return $r;
    }

    function getByUserAttendanceAndChild($userAttendanceId, $childId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('UserAttendanceChild.user_attendance_id' => $userAttendanceId, 'UserAttendanceChild.child_id' => $childId),
            'fields' => array ('UserAttendanceChild.*')
        ));
        return $r;
    }

}

?>