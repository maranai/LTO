<?php
/**
 * User: eblanco
 * Date: 4/30/13
 * Time: 9:32 AM
 */
App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
class ClassroomsController extends AppController
{

    public $uses = array('User', 'Classroom', 'Attendance', 'Program', 'University', 'Region', 'Child');

    public $layout = "index";

    function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');

        $title_for_layout = 'Lto';
        $this->set(compact('title_for_layout'));
        if($this->Sec->isLoggedIn() &&
            $this->canAccess($this->request)){
            $this->Auth->allow('*');
        }
    }

    function create(){
        //$this->autoRender = false;
        $classroom = $this->data;

        if (!empty($this->data)) {
            $name = $classroom['Classroom']['name'];
            $programId = $classroom['Classroom']['program'];

            $classroomData = array('name' => $name, 'program_id' => $programId);

            $this->Classroom->save($classroomData);

            $this->redirect( array( 'controller' => 'classrooms', 'action' => 'home', $classroom['Classroom']['role_name'] ));
        }
    }

    function home($roleName){
        if ($roleName == 'SITE_MANAGER') {
            $user = $this->User->findById($this->Sec->user('id'));
            $classrooms = $this->Classroom->getClassroomsByUniversity($user['User']['university_id']);
        }else{
            $classrooms = $this->Classroom->getClassrooms();
        }

        $classroomsVO = array();
        foreach($classrooms as $classroom){
            $classroomVO = array();
            $program = $this->Program->findById($classroom['Classroom']['program_id']);
            $classroomVO["id"] = $classroom['Classroom']['id'];
            $classroomVO["name"] = $classroom['Classroom']['name'];
            $classroomVO["programName"] = $program['Program']['name'];
            $classroomVO["programId"] = $program['Program']['id'];
            $classroomsVO[] = $classroomVO;
        }
        $this->set("allUniversities", $this->University->getUniversityList());
        $this->set("allRegions", $this->Region->getAllRegions());
        $this->set("allClassrooms", $this->Classroom->getClassroomList());
        $this->set("allPrograms", $this->Program->getProgramList());
        $this->set("classroomsVO", $classroomsVO);
        $this->set("roleName", $roleName);
    }


    function update(){
        $classroom = $this->data;

        if (!empty($this->data)) {
            $id = $classroom['Classroom']['classroom_id'];
            $name = $classroom['Classroom']['classroom_name'];
            $programId = $classroom['Classroom']['program_id'];
            $roleName = $classroom['Classroom']['user_role_name'];

            $classroom = $this->Classroom->findById( $id );
            $classroom['Classroom']['name'] = $name;
            $classroom['Classroom']['program_id'] = $programId;
            $this->Classroom->save( $classroom, array( "name", "program_id") );

            $this->redirect( array( 'controller' => 'classrooms', 'action' => 'home', $roleName ));
        }
    }
}