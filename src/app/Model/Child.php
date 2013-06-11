<?php
/**
 * User: eblanco
 * Date: 3/19/13
 * Time: 10:00 AM
 */

class Child extends AppModel
{

    public $belongsTo = array('Classroom');
    public $hasMany = array('Attendance');

    var $virtualFields = array(
        'full_name' => 'CONCAT(Child.first_name, " ", Child.last_name)'
    );

    function getChildListByClassroom($classroomId){
        $r = $this->find('list', array(
            'recursive' => 0,
            'conditions' => array('Child.classroom_id' => $classroomId),
            'fields' => array ('Child.id', 'Child.full_name'),
            'order' => array('Child.first_name' => 'asc')
        ));
        return $r;
    }

    function getChildrenByClassroom($classroomId){
        $r = $this->find('all', array(
            'recursive' => 0,
            'conditions' => array('Child.classroom_id' => $classroomId),
            'fields' => array ('Child.*'),
            'group' => array ('Child.id'),
            'order' => 'Child.first_name, Child.last_name'
        ));
        return $r;
    }

    function getChildrenByUniversity($universityId){
        $r = $this->find('all', array(
            'recursive' => 0,
            'conditions'=> array('Child.classroom_id=ClassroomTable.id'),
            'joins' => array(
                array(
                    'table' => 'universities',
                    'alias' => 'University',
                    'type' => 'left',
                    'conditions'=> array('University.id'=> $universityId)
                ),
                array(
                    'table' => 'programs',
                    'alias' => 'Program',
                    'type' => 'left',
                    'conditions'=> array('University.id=Program.university_id')
                ),
                array(
                    'table' => 'classrooms',
                    'alias' => 'ClassroomTable',
                    'type' => 'left',
                    'conditions'=> array('ClassroomTable.program_id=Program.id')
                ),
                array(
                    'table' => 'children',
                    'alias' => 'ChildTable',
                    'type' => 'left',
                    'conditions'=> array('ChildTable.classroom_id=ClassroomTable.id')
                )
            ),
            'fields' => array ('Child.*'),
            'group' => array ('Child.id'),
            'order' => 'Child.first_name, Child.last_name'
        ));
        return $r;
    }

    function getChildListByUniversity($universityId){
        $r = $this->find('list', array(
            'recursive' => 0,
            'conditions'=> array('Child.classroom_id=ClassroomTable.id'),
            'joins' => array(
                array(
                    'table' => 'universities',
                    'alias' => 'University',
                    'type' => 'left',
                    'conditions'=> array('University.id'=> $universityId)
                ),
                array(
                    'table' => 'programs',
                    'alias' => 'Program',
                    'type' => 'left',
                    'conditions'=> array('University.id=Program.university_id')
                ),
                array(
                    'table' => 'classrooms',
                    'alias' => 'ClassroomTable',
                    'type' => 'left',
                    'conditions'=> array('ClassroomTable.program_id=Program.id')
                ),
                array(
                    'table' => 'children',
                    'alias' => 'ChildTable',
                    'type' => 'left',
                    'conditions'=> array('ChildTable.classroom_id=ClassroomTable.id')
                )
                /*                array(
                                    'table' => 'attendances',
                                    'alias' => 'Attendance',
                                    'type' => 'left',
                                    'conditions'=> array('Attendance.child_id=Child.id')
                                )*/
            ),
            'fields' => array ('Child.id', 'Child.full_name'),
            'group' => array ('Child.id'),
            'order' => 'Child.first_name, Child.last_name'
        ));
        return $r;
    }

    function getChildrenByRegion($regionId){
        $r = $this->find('all', array(
            'recursive' => 0,
            'conditions'=> array('Child.classroom_id=ClassroomTable.id'),
            'joins' => array(
                array(
                    'table' => 'universities',
                    'alias' => 'University',
                    'type' => 'left',
                    'conditions'=> array('University.region_id'=> $regionId)
                ),
                array(
                    'table' => 'programs',
                    'alias' => 'Program',
                    'type' => 'left',
                    'conditions'=> array('University.id=Program.university_id')
                ),
                array(
                    'table' => 'classrooms',
                    'alias' => 'ClassroomTable',
                    'type' => 'left',
                    'conditions'=> array('ClassroomTable.program_id=Program.id')
                ),
                array(
                    'table' => 'children',
                    'alias' => 'ChildTable',
                    'type' => 'left',
                    'conditions'=> array('ChildTable.classroom_id=ClassroomTable.id')
                )
            ),
            'fields' => array ('Child.*'),
            'group' => array ('Child.id'),
            'order' => 'Child.first_name, Child.last_name'
        ));
        return $r;
    }

    function getChildListByRegion($regionId){
        $r = $this->find('list', array(
            'recursive' => 0,
            'conditions'=> array('Child.classroom_id=ClassroomTable.id'),
            'joins' => array(
                array(
                    'table' => 'universities',
                    'alias' => 'University',
                    'type' => 'left',
                    'conditions'=> array('University.region_id'=> $regionId)
                ),
                array(
                    'table' => 'programs',
                    'alias' => 'Program',
                    'type' => 'left',
                    'conditions'=> array('University.id=Program.university_id')
                ),
                array(
                    'table' => 'classrooms',
                    'alias' => 'ClassroomTable',
                    'type' => 'left',
                    'conditions'=> array('ClassroomTable.program_id=Program.id')
                ),
                array(
                    'table' => 'children',
                    'alias' => 'ChildTable',
                    'type' => 'left',
                    'conditions'=> array('ChildTable.classroom_id=ClassroomTable.id')
                )
            ),
            'fields' => array ('Child.id', 'Child.full_name'),
            'group' => array ('Child.id'),
            'order' => 'Child.first_name, Child.last_name'
        ));
        return $r;
    }

    function getAllChildren(){
        $r = $this->find('all', array(
            'recursive' => 0,
            'fields' => array ('Child.*'),
            'group' => array ('Child.id'),
            'order' => 'Child.first_name, Child.last_name'
        ));
        return $r;
    }

    function getChildList(){
        $r = $this->find('list', array(
            'recursive' => 0,
            'fields' => array ('Child.id', 'Child.full_name'),
            'group' => array ('Child.id'),
            'order' => 'Child.first_name, Child.last_name'
        ));
        return $r;
    }

    function findByIdNumber($number){
        $r = $this->find('first', array(
            'recursive' => -1,
            'conditions' => array('Child.ID_number' => $number),
            'fields' => array ('Child.*')
        ));
        return $r;
    }

}

?>