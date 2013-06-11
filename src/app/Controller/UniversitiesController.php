<?php
/**
 * User: eblanco
 * Date: 3/27/13
 * Time: 8:48 AM
 */

App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
class UniversitiesController extends AppController
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
        $university = $this->data;

        if (!empty($this->data)) {
            $name = $university['University']['name'];
            $regionId = $university['University']['region'];

            $universityData = array('name' => $name, 'region_id' => $regionId);

            $this->University->save($universityData);

            $this->redirect( array( 'controller' => 'users', 'action' => 'home', $university['University']['role_name'] ));
        }
    }

    function home($roleName){
        $universities = $this->University->getUniversities();
        $universitiesVO = array();
        foreach($universities as $university){
            $universityVO = array();
            $region = $this->Region->findById($university['University']['region_id']);
            $universityVO["id"] = $university['University']['id'];
            $universityVO["name"] = $university['University']['name'];
            $universityVO["regionName"] = $region['Region']['name'];
            $universityVO["regionId"] = $region['Region']['id'];
            $universitiesVO[] = $universityVO;
        }
        $this->set("allUniversities", $this->University->getUniversityList());
        $this->set("allRegions", $this->Region->getAllRegions());
        $this->set("universitiesVO", $universitiesVO);
        $this->set("allClassrooms", $this->Classroom->getClassroomList());
        $this->set("roleName", $roleName);
    }

    function update(){
        $university = $this->data;

        if (!empty($this->data)) {
            $id = $university['University']['university_id'];
            $name = $university['University']['uni_name'];
            $regionId = $university['University']['region_id'];
            $roleName = $university['University']['user_role_name'];

            $university = $this->University->findById( $id );
            $university['University']['name'] = $name;
            $university['University']['region_id'] = $regionId;
            $this->University->save( $university, array( "name", "region_id") );

            $this->redirect( array( 'controller' => 'universities', 'action' => 'home', $roleName ));
        }
    }

}