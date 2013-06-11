<?php
/**
 * User: eblanco
 * Date: 3/27/13
 * Time: 8:48 AM
 */

App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
class ProgramsController extends AppController
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
        $program = $this->data;

        if (!empty($this->data)) {
            $name = $program['Program']['name'];
            $universityId = $program['Program']['university'];

            $programData = array('name' => $name, 'university_id' => $universityId);

            $this->Program->save($programData);

            $this->redirect( array( 'controller' => 'users', 'action' => 'home', $program['Program']['role_name'] ));
        }
    }

    function home($roleName){
        if ($roleName == 'SITE_MANAGER') {
            $user = $this->User->findById($this->Sec->user('id'));
            $programs = $this->Program->getProgramsByUniversityId($user['User']['university_id']);
        }else{
            $programs = $this->Program->getAllPrograms();
        }

        $programsVO = array();
        foreach($programs as $program){
            $programVO = array();
            $university = $this->University->findById($program['Program']['university_id']);
            $programVO["id"] = $program['Program']['id'];
            $programVO["name"] = $program['Program']['name'];
            $programVO["universityName"] = $university['University']['name'];
            $programVO["universityId"] = $university['University']['id'];
            $programsVO[] = $programVO;
        }
        $this->set("allUniversities", $this->University->getUniversityList());
        $this->set("allRegions", $this->Region->getAllRegions());
        $this->set("allClassrooms", $this->Classroom->getClassroomList());
        $this->set("programsVO", $programsVO);
        $this->set("roleName", $roleName);
    }


    function update(){
        $program = $this->data;

        if (!empty($this->data)) {
            $id = $program['Program']['program_id'];
            $name = $program['Program']['program_name'];
            $universityId = $program['Program']['university_id'];
            $roleName = $program['Program']['user_role_name'];

            $program = $this->Program->findById( $id );
            $program['Program']['name'] = $name;
            $program['Program']['university_id'] = $universityId;
            $this->Program->save( $program, array( "name", "university_id") );

            $this->redirect( array( 'controller' => 'programs', 'action' => 'home', $roleName ));
        }
    }


}