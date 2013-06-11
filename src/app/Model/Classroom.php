<?php

/**
 * User: eblanco
 * Date: 3/19/13
 * Time: 10:00 AM
 */

class Classroom extends AppModel
{

    public $belongsTo = array('Program');
    public $hasMany = array('Child');

    function getClassroomsByProgramId($programId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions' => array('Classroom.program_id' => $programId)));
        return $r;
    }

    function getClassroomList(){
        $r = $this->find('list', array(
            'recursive' => 0,
            'fields' => array ('Classroom.id', 'Classroom.name')));
        return $r;
    }

    function getClassrooms(){
        $r = $this->find('all', array(
            'recursive' => -1,
            'fields' => array ('Classroom.*'),
            'order' => 'Classroom.name'
        ));
        return $r;
    }

    function getClassroomById($classId){
        $r = $this->find('list', array(
            'recursive' => 0,
            'conditions' => array('Classroom.id' => $classId),
            'fields' => array ('Classroom.id', 'Classroom.name')));
        return $r;
    }

    function getClassroomListByUniversity($universityId){
        $r = $this->find('list', array(
            'recursive' => 0,
            'conditions'=> array('Classroom.program_id=ProgramTable.id'),
            'joins' => array(
                array(
                    'table' => 'universities',
                    'alias' => 'University',
                    'type' => 'left',
                    'conditions'=> array('University.id'=> $universityId)
                ),
                array(
                    'table' => 'programs',
                    'alias' => 'ProgramTable',
                    'type' => 'left',
                    'conditions'=> array('University.id=ProgramTable.university_id')
                ),
                array(
                    'table' => 'classrooms',
                    'alias' => 'ClassroomTable',
                    'type' => 'left',
                    'conditions'=> array('ClassroomTable.program_id=ProgramTable.id')
                )
            ),
            'fields' => array ('Classroom.id', 'Classroom.name'),
            'group' => array ('Classroom.id'),
            'order' => 'Classroom.id'
        ));
        return $r;
    }

    function getClassroomsByUniversity($universityId){
        $r = $this->find('all', array(
            'recursive' => -1,
            'conditions'=> array('Classroom.program_id=ProgramTable.id'),
            'joins' => array(
                array(
                    'table' => 'universities',
                    'alias' => 'University',
                    'type' => 'left',
                    'conditions'=> array('University.id'=> $universityId)
                ),
                array(
                    'table' => 'programs',
                    'alias' => 'ProgramTable',
                    'type' => 'left',
                    'conditions'=> array('University.id=ProgramTable.university_id')
                ),
                array(
                    'table' => 'classrooms',
                    'alias' => 'ClassroomTable',
                    'type' => 'left',
                    'conditions'=> array('ClassroomTable.program_id=ProgramTable.id')
                )
            ),
            //'fields' => array ('Classroom.id', 'Classroom.name'),
            'group' => array ('Classroom.id'),
            'order' => 'Classroom.id'
        ));
        return $r;
    }

    function getClassroomListByRegion($regionId){
        $r = $this->find('list', array(
            'recursive' => 0,
            'conditions'=> array('Classroom.program_id=ProgramTable.id'),
            'joins' => array(
                array(
                    'table' => 'universities',
                    'alias' => 'University',
                    'type' => 'left',
                    'conditions'=> array('University.region_id'=> $regionId)
                ),
                array(
                    'table' => 'programs',
                    'alias' => 'ProgramTable',
                    'type' => 'left',
                    'conditions'=> array('University.id=ProgramTable.university_id')
                ),
                array(
                    'table' => 'classrooms',
                    'alias' => 'ClassroomTable',
                    'type' => 'left',
                    'conditions'=> array('ClassroomTable.program_id=ProgramTable.id')
                )
            ),
            'fields' => array ('Classroom.id', 'Classroom.name'),
            'group' => array ('Classroom.id'),
            'order' => 'Classroom.id'
        ));
        return $r;
    }

}

?>