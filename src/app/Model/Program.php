<?php
/**
 * User: eblanco
 * Date: 3/19/13
 * Time: 10:11 AM
 */

class Program extends AppModel
{

    public $belongsTo = array('University');
    public $hasMany = array('Classroom');

    function getProgramsByUniversityId($universityId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('Program.university_id' => $universityId)
        ));
        return $r;
    }

    function getAllPrograms(){
        $r = $this->find('all', array(
            'recursive' => -1,
            'fields' => array ('Program.*'),
            'order' => 'Program.name'
        ));
        return $r;
    }

    function getProgramList(){
        $r = $this->find('list', array(
            'recursive' => 0,
            'fields' => array ('Program.id', 'Program.name')));
        return $r;
    }

}

?>