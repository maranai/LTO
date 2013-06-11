<?php
/**
 * User: eblanco
 * Date: 3/27/13
 * Time: 8:48 AM
 */

App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
class ChildrenController extends AppController
{

    public $uses = array('User', 'Classroom', 'Attendance', 'Program', 'University', 'Region', 'Child');

    public $layout = "index";

    function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');

        $title_for_layout = 'Lto';
        $this->set(compact('title_for_layout'));
    }

    function create(){
        $child = $this->data;
        $this->view='json';
        if (!empty($this->data)) {
            if ($child['Child']['id_number'] == null) {
                $childById = null;
            }else{
                $childById = $this->Child->findByIdNumber($child['Child']['id_number']);
            }
            if ($childById == null) {
                $idNumber = $child['Child']['id_number'];
                $classroomId = $child['Child']['classroom_id'];
                $firstName = $child['Child']['first_name'];
                $lastName = $child['Child']['last_name'];

                $childData = array('ID_number' => $idNumber, 'first_name' => $firstName,
                    'last_name' => $lastName, 'classroom_id' => $classroomId);

                $this->Child->save($childData);
                $response = array('success' => true);
            }else{
                $response = array('success' => false, 'message' => 'The ID Number already exists!');
            }
            $this->renderJson($response);
        }
    }

    function update(){
        $child = $this->data;
        $this->view='json';
        if (!empty($this->data)) {
            if ($child['Child']['id_number'] == null) {
                $childById = null;
            }else{
                $childById = $this->Child->findByIdNumber($child['Child']['id_number']);
            }

            if ($childById == null || $childById['Child']['id'] == $child['Child']['child_id']) {
                $id = $child['Child']['child_id'];
                $idNumber = $child['Child']['id_number'];
                $firstName = $child['Child']['child_first_name'];
                $lastName = $child['Child']['child_last_name'];

                $child = $this->Child->findById( $id );
                $child['Child']['ID_number'] = $idNumber;
                $child['Child']['first_name'] = $firstName;
                $child['Child']['last_name'] = $lastName;
                $child['Child']['last_name_initial'] = substr($child['Child']['last_name'], 0, 1);
                $this->Child->save( $child, array( "ID_number", "first_name", "last_name") );
                $response = array('success' => true);
            }else{
                $response = array('success' => false, 'message' => 'The ID Number already exists!');
            }
            $this->renderJson($response);
        }
    }

    function delete(){
        $child = $this->data;

        if (!empty($this->data)) {
            $id = $child['Child']['delete_child_id'];
            $roleName = $child['Child']['user_role_name'];

            $currentChild = $this->Child->findById( $id );
            $attendances = $this->Attendance->getSessionsByChildId( $id );
            foreach($attendances as $attendance){
                $this->Attendance->delete($attendance["Attendance"]["id"]);
            }

            $this->Child->delete( $currentChild["Child"]["id"] );

            $this->redirect( array( 'controller' => 'users', 'action' => 'home', $roleName ));
        }
    }

}