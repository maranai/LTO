<?php
/**
 * User: eblanco
 * Date: 3/19/13
 * Time: 10:15 AM
 */

class Attendance extends AppModel
{

    public $belongsTo = array('Child');

    function getSessionsByChildId($childId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('Attendance.child_id' => $childId),
            'fields' => array ('Attendance.*'),
            'order' => array('Attendance.id' => 'asc')
        ));
        return $r;
    }

    function getAllSessions(){
        $r = $this->find('all', array(
            'recursive' => 0,
            'order' => array('Attendance.child_id' => 'desc')
        ));
        return $r;
    }

    function getSessionByNumberAndChild($childId, $number){
        $r = $this->find('first', array(
            'recursive' => -1,
            'conditions' => array('Attendance.child_id' => $childId, 'Attendance.session_number' => $number),
            'fields' => array ('Attendance.*')
        ));
        return $r;
    }

    function getMinSessionDate(){
        $r = $this->find('first', array(
            'recursive' => -1,
            'fields' => array('MIN(Attendance.session_date) as min_date')
        ));
        return $r;
    }

    function getMaxSessionDate(){
        $r = $this->find('first', array(
            'recursive' => -1,
            'fields' => array('MAX(Attendance.session_date) max_date')
        ));
        return $r;
    }

    function getDistinctDatesByRange($from, $to){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('Attendance.session_date BETWEEN ? AND ?' => array($from,$to)),
            'fields' => array('DISTINCT Attendance.session_date'),
            'order' => array('Attendance.session_date' => 'asc')
        ));
        return $r;
    }

    function getSessionByDateAndChild($childId, $date){
        $r = $this->find('first', array(
            'recursive' => -1,
            'conditions' => array('Attendance.child_id' => $childId, 'Attendance.session_date' => $date),
            'fields' => array ('Attendance.*')
        ));
        return $r;
    }

}

?>