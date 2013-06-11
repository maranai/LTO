<?php

App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');
class UsersController extends AppController
{

    public $uses = array('User', 'Classroom', 'Attendance', 'Program', 'University', 'Region', 'Child');

    public $layout = "index";

    function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');

        $title_for_layout = 'Lto';
        $this->set(compact('title_for_layout'));


    }


    function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $roleName = $this->Sec->user('role_name');
                $this->home($roleName);
            } else {
                $this->Session->setFlash(__('Username or password is incorrect'), 'default', array(), 'auth');
            }
        }else{
            if ($this->Sec->isLoggedIn()){
                $this->home($this->Sec->user('role_name'));

            }
        }

    }

    function home($roleName) {
        $program = null;
        $region = null;
        $university = null;
        if ($roleName == 'NATIONAL_RESEARCH' || $roleName == 'ADMIN') {
            $childrenList = $this->Child->getAllChildren();
        }else{
            if ($roleName == 'SITE_MANAGER') {
                $childrenList = $this->Child->getChildrenByUniversity($this->Sec->user('university_id'));
            }else{
                if ($roleName == 'PROJECT_DIRECTOR') {
                    $childrenList = $this->Child->getChildrenByRegion($this->Sec->user('region_id'));
                }else{
                    if ($roleName == 'TEAM_LEAD' || $roleName == 'CORP_MEMBER') {
                        $childrenList = $this->Child->getChildrenByClassroom($this->Sec->user('classroom_id'));
                    }
                }
            }
        }

        $childrenVO = array();

        foreach($childrenList as $child){
            $childVO = array();
            $childVO["id"] = $child['Child']['id'];
            $childVO["firstName"] = $child['Child']['first_name'];
            $childVO["lastName"] = $child['Child']['last_name'];
            $childVO["lastInitial"] = substr($child['Child']['last_name'], 0, 1);
            $childVO["IDNumber"] = $child['Child']['ID_number'];

            /*            $attendanceVOs = array();
                        foreach($child['Attendance'] as $attendance){
                            $attendanceVO = array();
                            $attendanceVO["id"] = $attendance['id'];
                            $attendanceVO["number"] = $attendance['session_number'];
                            $attendanceVO["date"] = date( "m-d-Y", strtotime( $attendance['session_date'] ) );
                            if ($attendance['assisted'] == 1) {
                                $assisted = "Yes";
                            }else{
                                $assisted = "No";
                            }
                            $attendanceVO["assisted"] = $assisted;
                            $attendanceVO["hours"] = $attendance['hours'];
                            $attendanceVO["childId"] = $attendance['child_id'];
                            $attendanceVO["classroomId"] = $attendance['classroom_id'];
                            $attendanceVOs[] = $attendanceVO;
                        }
                        $childVO["attendances"] = $attendanceVOs;*/

            $classroom = $this->Classroom->findById($child['Child']['classroom_id']);
            $childVO["className"] = $classroom['Classroom']['name'];
            $program = $this->Program->findById($classroom['Classroom']['program_id']);
            $childVO["programName"] = $program['Program']['name'];

            $university = $this->University->findById($program['Program']['university_id']);
            $childVO["universityName"] = $university['University']['name'];

            $region = $this->Region->findById($university['University']['region_id']);
            $childVO["regionName"] = $region['Region']['name'];
            $childrenVO[] = $childVO;

        }

        $children = null;
        $userClassroom = null;
        if ($roleName == 'TEAM_LEAD' || $roleName == 'CORP_MEMBER') {
            $children = $this->Child->getChildListByClassroom($this->Sec->user('classroom_id'));
            $userClassroom = $this->Classroom->findById($this->Sec->user('classroom_id'));
        }

        if ($roleName == 'SITE_MANAGER') {
            $children = $this->Child->getChildListByUniversity($this->Sec->user('university_id'));
            $userClassroom = $this->Classroom->getClassroomListByUniversity($this->Sec->user('university_id'));
        }

        if ($roleName == 'PROJECT_DIRECTOR') {
            $children = $this->Child->getChildListByRegion($this->Sec->user('region_id'));
            $userClassroom = $this->Classroom->getClassroomListByRegion($this->Sec->user('region_id'));
        }

        if ($roleName == 'ADMIN') {
            $children = $this->Child->getChildList();
            $userClassroom = $this->Classroom->getClassroomList();
        }

        $this->set("childrenVO", $childrenVO);
        $this->set("userClassroom", $userClassroom);
        $this->set("allUniversities", $this->University->getUniversityList());
        $this->set("allRegions", $this->Region->getAllRegions());
        $this->set("allClassrooms", $this->Classroom->getClassroomList());
        $this->set("roleName", $roleName);
        $this->set("children", $children);

        $this->view = "/Users/home";

    }


    function isLoggedIn()
    {
        $response = array("success" => false);
        if ($this->Sec->isLoggedIn() && $this->Sec->isTeacher()){
            $userId = $this->Sec->user('id');
            $response = array("success" => true, "user_id" => $userId);
        }
        $this->renderJson($response);
    }

    function logout()
    {
        $this->Sec->clear();
        $this->redirect($this->Auth->logout());
    }


    // function used to keep the current session alive
    function pulse()
    {
        $response = array("success" => false);
        if ($this->Sec->isLoggedIn()){
            $userType = ($this->Sec->isTeacher()) ? 'teacher' : 'student';
            $userId = $this->Sec->user('id');
            $response = array("success" => true, "type" => $userType, 'userId' => $userId);
        }
        $this->renderJson($response);
    }

    function exportToCsv(){
        $user = $this->data;
        $roleName = $user['User']['role_name'];
        $reportType = $user['User']['report type:'];

        $this->viewClass = 'Media';
        $childrenList = $this->Child->getAllChildren();
        //*******clean directory (attendance) and create a new csv***********
        $this->cleanDirectory( WWW_ROOT.'attendance/');

        touch(WWW_ROOT.'attendance/attendance'.$this->Sec->user('id').'.csv');
        $fileName = WWW_ROOT.'attendance/attendance'.$this->Sec->user('id').'.csv';

        if ($reportType == 'bySession') {
            $this->createReportBySession( $fileName, $childrenList );
        }else{
            $this->createReportByDate( $fileName, $childrenList );
        }

        //*******************************************************************

        $params = array(
            'id'		=>	$fileName,
            'name'		=>	'ChildAttendance',
            'extension'	=>	'csv',
            'download'	=>	true,
            'cache'		=>	false,
            'path'		=>	DS
        );
        $this->set($params);

    }

    private function createReportBySession($fileName, $childrenList) {
        $fp = fopen($fileName, 'w');
        // output the column headings
        fputcsv($fp, array('First Name', 'Last Name', 'ID number', 'Region', 'University', 'Program Partner', 'Classroom',
            'Session 1a', 'Session 1b', 'Session 2a', 'Session 2b', 'Session 3a', 'Session 3b', 'Session 4a', 'Session 4b'
        , 'Session 5a', 'Session 5b', 'Session 6a', 'Session 6b', 'Session 7a', 'Session 7b', 'Session 8a', 'Session 8b'
        , 'Session 9a', 'Session 9b', 'Session 10a', 'Session 10b', 'Session 11a', 'Session 11b', 'Session 12a', 'Session 12b'
        , 'Session 13a', 'Session 13b', 'Session 14a', 'Session 14b', 'Session 15a', 'Session 15b', 'Session 16a', 'Session 16b'
        , 'Session 17a', 'Session 17b', 'Session 18a', 'Session 18b', 'Session 19a', 'Session 19b', 'Session 20a', 'Session 20b'));
        foreach($childrenList as $child){

            $classroom = $this->Classroom->findById($child['Child']['classroom_id']);
            $classroomName = $classroom['Classroom']['name'];
            $program = $this->Program->findById($classroom['Classroom']['program_id']);
            $programName = $program['Program']['name'];

            $university = $this->University->findById($program['Program']['university_id']);
            $universityName = $university['University']['name'];

            $region = $this->Region->findById($university['University']['region_id']);
            $regionName = $region['Region']['name'];

            $sessions = array('1a','1b','2a','2b','3a','3b','4a','4b','5a','5b','6a','6b','7a','7b','8a','8b','9a','9b','10a','10b',
                '11a','11b','12a','12b','13a','13b','14a','14b','15a','15b','16a','16b','17a','17b','18a','18b','19a','19b','20a','20b');

            $sessionValues = array();
            foreach($sessions as $session){
                $childSession = $this->Attendance->getSessionByNumberAndChild($child['Child']['id'],$session);
                if ($childSession == null) {
                    $hasSession = '';
                }else{
                    if ($childSession['Attendance']['assisted'] == 1) {
                        $hasSession = 1;
                    }else{
                        $hasSession = 0;
                    }
                }
                $sessionValues[] = $hasSession;
            }

            $columnValues = array($child['Child']['first_name'], $child['Child']['last_name'], $child['Child']['ID_number'],
                $regionName, $universityName, $programName, $classroomName);

            foreach ($sessionValues as $sessionValue) {
                $columnValues[] =  $sessionValue;
            }

            fputcsv($fp, $columnValues);

        }

        fclose($fp);
    }

    private function createReportByDate($fileName, $childrenList) {
        $fp = fopen($fileName, 'w');
        $minDate = $this->Attendance->getMinSessionDate();
        $maxDate = $this->Attendance->getMaxSessionDate();

        $dates = $this->Attendance->getDistinctDatesByRange($minDate[0]['min_date'], $maxDate[0]['max_date']);

        $headerValues = array('First Name', 'Last Name', 'ID number', 'Region', 'University', 'Program Partner', 'Classroom');
        foreach ($dates as $date) {
            $headerValues[] = date( "m-d-Y", strtotime($date['Attendance']['session_date']));
        }
        fputcsv($fp, $headerValues);

        foreach($childrenList as $child){

            $classroom = $this->Classroom->findById($child['Child']['classroom_id']);
            $classroomName = $classroom['Classroom']['name'];
            $program = $this->Program->findById($classroom['Classroom']['program_id']);
            $programName = $program['Program']['name'];

            $university = $this->University->findById($program['Program']['university_id']);
            $universityName = $university['University']['name'];

            $region = $this->Region->findById($university['University']['region_id']);
            $regionName = $region['Region']['name'];

            $sessionValues = array();
            foreach ($dates as $date) {
                $childSession = $this->Attendance->getSessionByDateAndChild($child['Child']['id'],$date['Attendance']['session_date']);
                if ($childSession == null) {
                    $hasSession = '';
                }else{
                    if ($childSession['Attendance']['assisted'] == 1) {
                        $hasSession = 1;
                    }else{
                        $hasSession = 0;
                    }
                }
                $sessionValues[] = $hasSession;
            }

            $columnValues = array($child['Child']['first_name'], $child['Child']['last_name'], $child['Child']['ID_number'],
                $regionName, $universityName, $programName, $classroomName);

            foreach ($sessionValues as $sessionValue) {
                $columnValues[] =  $sessionValue;
            }

            fputcsv($fp, $columnValues);
        }

        fclose($fp);
    }

    private function cleanDirectory( $directory ) {
        $files = glob( $directory . '*', GLOB_MARK );
        foreach ($files as $file):
            unlink($file);
        endforeach;
    }

    public function userList($userRole){
        $users = $this->User->getUserList();
        $usersVO = array();
        foreach($users as $user){
            $userVO = array();
            $userVO["id"] = $user['User']['id'];
            $userVO["firstName"] = $user['User']['first_name'];
            $userVO["lastName"] = $user['User']['last_name'];

            $role = $user['User']['role_name'];
            $roleName = null;
            if ($role == 'TEAM_LEAD') {
                $roleName = 'Team Lead';
            }else if ($role == 'SITE_MANAGER'){
                $roleName = 'Site Manager';
            }else if ($role == 'PROJECT_DIRECTOR'){
                $roleName = 'Project Director';
            }else if ($role == 'NATIONAL_RESEARCH'){
                $roleName = 'National Research';
            }else if ($role == 'CORP_MEMBER'){
                $roleName = 'Corp Member';
            }else {
                $roleName = 'Admin';
            }

            $userVO["roleName"] = $roleName;
            $userVO["username"] = $user['User']['username'];
            $userVO["classroomId"] = $user['User']['classroom_id'];
            $userVO["universityId"] = $user['User']['university_id'];
            $userVO["regionId"] = $user['User']['region_id'];
            //$userVO["password"] = $this->Auth->password($user['User']['password']) ;
            $userVO["password"] = $user['User']['password'];
            $userVO["password"] = $user['User']['old_password'];
            $userVO["email"] = $user['User']['email_address'];
            $usersVO[] = $userVO;
        }
        $this->set("allUniversities", $this->University->getUniversityList());
        $this->set("allRegions", $this->Region->getAllRegions());
        $this->set("allClassrooms", $this->Classroom->getClassroomList());
        $this->set("roleName", $userRole);
        $this->set("usersVO", $usersVO);
    }

    function update(){
        //$this->autoRender = false;
        $this->view='json';
        $user = $this->data;

        if (!empty($this->data)) {
            $id = $user['User']['user_id'];
            $firstName = $user['User']['user_first_name'];
            $lastName = $user['User']['user_last_name'];
            $username = $user['User']['user_name'];
            $userEmail = $user['User']['user_email'];
            $userClassroomId = $user['User']['user_classroom_id'];
            $userUniversityId = $user['User']['user_university_id'];
            $userRegionId = $user['User']['user_region_id'];
            //$roleName = $user['User']['user_role_name'];

            $currentUser = $this->User->findById( $id );
            $currentUser['User']['id'] = $id;
            $currentUser['User']['first_name'] = $firstName;
            $currentUser['User']['last_name'] = $lastName;
            $currentUser['User']['username'] = $username;
            $currentUser['User']['email_address'] = $userEmail;
            $currentUser['User']['classroom_id'] = $userClassroomId;
            $currentUser['User']['university_id'] = $userUniversityId;
            $currentUser['User']['region_id'] = $userRegionId;
            //$this->User->save( $currentUser, true, array( "first_name", "last_name", "username", "email_address", "classroom_id", "university_id", "region_id") );

            //*********************
            $isValid = true;
            //$userData = $this->data;

            $password = $this->data['User']['password'];
            $passwordConfirm = $this->data['User']['password_confirm'];

            // Set User's ID in model which is needed for validation
            $this->User->id = $this->Auth->user('id');
            if (!empty($password)) {
                $old_password = $this->User->password_old($this->data['User']);

                // check if old pass is right
                if(!$old_password){
                    $isValid = false;
                    $response = array('success' => false, 'message' => 'Current password incorrect');
                }
                // and if pass is long enough
                else if (strlen($password) < 8) {
                    $isValid = false;
                    $response = array('success' => false, 'message' => 'Password should be 8 characters long');
                } // ...or if its confirmed
                elseif ($password != $passwordConfirm) {
                    $isValid = false;
                    $response = array('success' => false, 'message' => 'Passwords should match');
                } else {
                    // then let's make the encription
                    $currentUser['User']['old_password'] = $this->Auth->password($this->data['User']['password_old']);
                    $currentUser['User']['password'] = $this->Auth->password($this->data['User']['password']);
                }
            } else {
                unset($currentUser['User']['password']);
                unset($currentUser['User']['password_old']);
            }

            if ($isValid) {
                //$user = $this->User->save($userData, false);
                $this->User->save( $currentUser, true, array( "first_name", "last_name", "username", "email_address", "classroom_id", "university_id", "region_id", "old_password", "password") );
                $response = array('success' => true);
                $this->Session->setFlash(__('User updated successfully.', true));
            }

            //******************

            $this->renderJson($response);
            //$this->redirect( array( 'controller' => 'users', 'action' => 'userList', $roleName ));
        }
    }

    function create(){
        $this->view='json';
        $user = $this->data;

        if (!empty($this->data)) {
            $userByUsername = $this->User->findByUsername( $user['User']['username']);
            if ($userByUsername == null) {
                $newUser = $this->User->create();
                $newUser['User']['first_name'] = $user['User']['first_name'];
                $newUser['User']['last_name'] = $user['User']['last_name'];
                $newUser['User']['email_address'] = $user['User']['email'];
                $newUser['User']['username'] = $user['User']['username'];
                $newUser['User']['password'] = $this->Auth->password($user['User']['password']);
                $newUser['User']['old_password'] = $this->Auth->password($user['User']['password']);
                $newUser['User']['role_name'] = $user['User']['role name:'];

                if ($user['User']['role name:'] == 'TEAM_LEAD' || $user['User']['role name:'] == 'CORP_MEMBER') {
                    $newUser['User']['classroom_id'] = $user['User']['classroom'];
                }else{
                    if ($user['User']['role name:'] == 'SITE_MANAGER') {
                        $newUser['User']['university_id'] = $user['User']['university'];
                    }else{
                        if ($user['User']['role name:'] == 'PROJECT_DIRECTOR') {
                            $newUser['User']['region_id'] = $user['User']['region'];
                        }
                    }
                }

                $this->User->save($newUser, false);
                $response = array('success' => true);
            }else{
                $response = array('success' => false, 'message' => 'Username already exists!');
            }
            $this->renderJson($response);
        }
    }

    function delete(){
        $user = $this->data;

        if (!empty($this->data)) {
            $id = $user['User']['delete_user_id'];
            $roleName = $user['User']['user_role_name'];

            $currentUser = $this->User->findById( $id );
            $this->User->delete( $currentUser["User"]["id"] );

            $this->redirect( array( 'controller' => 'users', 'action' => 'userList', $roleName ));
        }
    }

    function editProfile(){
        //$this->autoRender = false;
        $this->view='json';
        $user = $this->data;

        if (!empty($this->data)) {
            $id = $user['User']['profile_user_id'];
            $firstName = $user['User']['profile_user_first_name'];
            $lastName = $user['User']['profile_user_last_name'];
            $userEmail = $user['User']['profile_user_email'];

            $currentUser = $this->User->findById( $id );
            $currentUser['User']['id'] = $id;
            $currentUser['User']['first_name'] = $firstName;
            $currentUser['User']['last_name'] = $lastName;
            $currentUser['User']['email_address'] = $userEmail;

            //*********************
            $isValid = true;
            //$userData = $this->data;

            $password = $this->data['User']['profile_password'];
            $passwordConfirm = $this->data['User']['profile_password_confirm'];

            // Set User's ID in model which is needed for validation
            $this->User->id = $this->Auth->user('id');
            if (!empty($password)) {
                $old_password = $this->User->profile_password_old($this->data['User']);

                // check if old pass is right
                if(!$old_password){
                    $isValid = false;
                    $response = array('success' => false, 'message' => 'Current password incorrect');
                }
                // and if pass is long enough
                else if (strlen($password) < 8) {
                    $isValid = false;
                    $response = array('success' => false, 'message' => 'Password should be 8 characters long');
                } // ...or if its confirmed
                elseif ($password != $passwordConfirm) {
                    $isValid = false;
                    $response = array('success' => false, 'message' => 'Passwords should match');
                } else {
                    // then let's make the encription
                    $currentUser['User']['old_password'] = $this->Auth->password($this->data['User']['profile_password_old']);
                    $currentUser['User']['password'] = $this->Auth->password($this->data['User']['profile_password']);
                }
            } else {
                unset($currentUser['User']['password']);
                unset($currentUser['User']['password_old']);
            }

            if ($isValid) {
                //$user = $this->User->save($userData, false);
                $this->User->save( $currentUser, false, array( "first_name", "last_name", "email_address", "old_password", "password") );
                $response = array('success' => true);
                $this->Session->setFlash(__('User updated successfully.', true));
            }

            //******************

            $this->renderJson($response);
            //$this->redirect( array( 'controller' => 'users', 'action' => 'userList', $roleName ));
        }
    }


}

?>