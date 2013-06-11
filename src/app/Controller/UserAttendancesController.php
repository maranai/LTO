<?php
/**
 * User: eblanco
 * Date: 4/16/13
 * Time: 10:17 AM
 */

App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');

class UserAttendancesController extends AppController
{

    public $uses = array('User', 'Classroom', 'UserAttendance', 'Program',
        'Child', 'Region', 'University', 'UserAttendanceChild');

    public $helpers = array('Html', 'Form', 'Session');
    public  $components = array('Session', 'Auth');

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


    function create()
    {
        $userAttendance = $this->data;

        if (!empty($userAttendance)) {
            $userId = $this->Sec->user('id');
            $hours = $userAttendance['UserAttendance']['hours'];
            $sessionDate = $userAttendance['UserAttendance']['user_attendance_date'];

            $userAttendanceData = array('session_date' => $sessionDate, 'hours' => $hours, 'user_id' => $userId);

            $this->UserAttendance->save($userAttendanceData);
            $userAttendanceId =  $this->UserAttendance->getInsertId();
            $total_check = $userAttendance['UserAttendance']['total_check'];

            for ( $i=1;$i<$total_check;$i++ ) {
                $childId = $userAttendance['UserAttendance']['child'.$i];
                $checkValue = $userAttendance['UserAttendance']['check'.$i];
                if ($checkValue == 1) {
                    $this->UserAttendanceChild->create();
                    $userAttendanceChildData = array('user_attendance_id' => $userAttendanceId, 'child_id' => $childId);
                    $this->UserAttendanceChild->save($userAttendanceChildData);
                }
            }

            $this->redirect( array( 'controller' => 'userAttendances', 'action' => 'home', $this->Sec->user('id'), $userAttendance['UserAttendance']['role_name'], null ));
        }
    }

    function update($userAttendanceId){
        $user = $this->User->findById($this->Sec->user('id'));
        $roleName = $user['User']['role_name'];
        $this->Session->setFlash(__('Update!', 'update_user_attendance'));
        $this->redirect( array( 'controller' => 'userAttendances', 'action' => 'home', $this->Sec->user('id'), $roleName, $userAttendanceId));
    }


    function updateUserAttendance(){
        $userAttendance = $this->data;

        if (!empty($this->data)) {
            $id = $userAttendance['UserAttendance']['attendance_id'];
            $hours = $userAttendance['UserAttendance']['attendance_hours'];
            $userId = $userAttendance['UserAttendance']['attendance_user_id'];
            $attendanceDate = $userAttendance['UserAttendance']['attendance_date_update'];
            $roleName = $userAttendance['UserAttendance']['user_role_name'];

            $attendance = $this->UserAttendance->findById( $id );
            $attendance['UserAttendance']['hours'] = $hours;
            $attendance['UserAttendance']['user_id'] = $userId;
            $attendance['UserAttendance']['session_date'] = $attendanceDate;
            $this->UserAttendance->save( $attendance, array("hours", "user_id", "session_date") );

            $userAttendances = $this->UserAttendanceChild->getByUserAttendanceId($id);
            foreach($userAttendances as $userAttendanceChild){
                $this->UserAttendanceChild->delete($userAttendanceChild["UserAttendanceChild"]["id"]);
            }

            $total_check = $userAttendance['UserAttendance']['total_check'];

            for ( $i=1;$i<$total_check;$i++ ) {
                $childId = $userAttendance['UserAttendance']['child'.$i];
                $checkValue = $userAttendance['UserAttendance']['check'.$i];
                if ($checkValue == 1) {
                    $this->UserAttendanceChild->create();
                    $userAttendanceChildData = array('user_attendance_id' => $id, 'child_id' => $childId);
                    $this->UserAttendanceChild->save($userAttendanceChildData);
                }
            }

            $this->redirect( array( 'controller' => 'userAttendances', 'action' => 'home', $this->Sec->user('id'), $roleName, $id ));
        }
    }

    function delete(){
        $userAttendance = $this->data;

        if (!empty($this->data)) {
            $id = $userAttendance['UserAttendance']['delete_attendance_id'];
            $roleName = $userAttendance['UserAttendance']['user_role_name'];

            $userAttendances = $this->UserAttendanceChild->getByUserAttendanceId($id);
            foreach($userAttendances as $userAttendanceChild){
                $this->UserAttendanceChild->delete($userAttendanceChild["UserAttendanceChild"]["id"]);
            }

            $this->UserAttendance->delete($id);

            $this->redirect( array( 'controller' => 'userAttendances', 'action' => 'home', $this->Sec->user('id'), $roleName));
        }
    }

    function home($userId, $roleName, $userAttendanceId = null){
        $attendancesVO = array();
        $childList = $this->Child->getChildrenByClassroom($this->Sec->user('classroom_id'));
        if ($roleName == 'CORP_MEMBER' || $roleName == 'TEAM_LEAD') {
            $attendances = $this->UserAttendance->getSessionsByUserId($userId);
            foreach($attendances as $attendance){
                $attendanceVO = array();
                $attendanceVO["id"] = $attendance['UserAttendance']['id'];
                $attendanceVO["userId"] = $attendance['UserAttendance']['user_id'];
                $attUser = $this->User->findById($attendance['UserAttendance']['user_id']);
                $attendanceVO["firstName"] = $attUser['User']['first_name'];
                $attendanceVO["lastName"] = $attUser['User']['last_name'];
                $attendanceVO["sessionDate"] = date( "Y-m-d", strtotime( $attendance['UserAttendance']['session_date'] ) );
                $attendanceVO["hours"] = $attendance['UserAttendance']['hours'];

                $attendancesVO[] = $attendanceVO;
            }
        }else if ($roleName == 'ADMIN') {
            $users = $this->User->getUserList();
            foreach($users as $user){
                $attendances = $this->UserAttendance->getSessionsByUserId($user['User']['id']);
                foreach($attendances as $attendance){
                    $attendanceVO = array();
                    $attendanceVO["id"] = $attendance['UserAttendance']['id'];
                    $attendanceVO["userId"] = $attendance['UserAttendance']['user_id'];
                    $attUser = $this->User->findById($attendance['UserAttendance']['user_id']);
                    $attendanceVO["firstName"] = $attUser['User']['first_name'];
                    $attendanceVO["lastName"] = $attUser['User']['last_name'];
                    $attendanceVO["sessionDate"] = date( "Y-m-d", strtotime( $attendance['UserAttendance']['session_date'] ) );
                    $attendanceVO["hours"] = $attendance['UserAttendance']['hours'];
                    $attendancesVO[] = $attendanceVO;
                }
            }
        }else{
            $currentUser = $this->User->findById($userId);
            $universityId = $currentUser['User']['university_id'];
            $users = $this->User->getUsersUnderUniversity($universityId);
            foreach($users as $user){
                $attendances = $this->UserAttendance->getSessionsByUserId($user['User']['id']);
                foreach($attendances as $attendance){
                    $attendanceVO = array();
                    $attendanceVO["id"] = $attendance['UserAttendance']['id'];
                    $attendanceVO["userId"] = $attendance['UserAttendance']['user_id'];
                    $attUser = $this->User->findById($attendance['UserAttendance']['user_id']);
                    $attendanceVO["firstName"] = $attUser['User']['first_name'];
                    $attendanceVO["lastName"] = $attUser['User']['last_name'];
                    $attendanceVO["sessionDate"] = date( "Y-m-d", strtotime( $attendance['UserAttendance']['session_date'] ) );
                    $attendanceVO["hours"] = $attendance['UserAttendance']['hours'];
                    $attendancesVO[] = $attendanceVO;
                }
            }
        }

        $children = null;
        $userClassroom = null;
        if ($roleName == 'TEAM_LEAD') {
            $children = $this->Child->getChildListByClassroom($this->Sec->user('classroom_id'));
            $userClassroom = $this->Classroom->findById($this->Sec->user('classroom_id'));
        }

        $attendanceVO = null;
        if ($userAttendanceId != 'null' && $userAttendanceId != null) {
            $attendance = $this->UserAttendance->findById( $userAttendanceId );
            if ($roleName == 'ADMIN' || $roleName == 'SITE_MANAGER') {
                $userByAttendance = $this->User->findById($attendance['UserAttendance']['user_id']);
                $childList = $this->Child->getChildrenByClassroom($userByAttendance['User']['classroom_id']);
            }else{
                $childList = $this->Child->getChildrenByClassroom($this->Sec->user('classroom_id'));
            }

            $attendanceVO = array();
            $childrenVO = array();
            foreach($childList as $child){
                $hasAttendance = $this->UserAttendanceChild->getByUserAttendanceAndChild($userAttendanceId, $child['Child']['id']);
                $childVO = array();
                $childVO["id"] = $child['Child']['id'];
                $childVO["firstName"] = $child['Child']['first_name'];
                $childVO["lastName"] = $child['Child']['last_name'];
                if ($hasAttendance == null) {
                    $childVO["hasAttendance"] = 0;
                }else{
                    $childVO["hasAttendance"] = 1;
                }

                $childrenVO[] = $childVO;
            }

            $user = $this->User->findById($this->Sec->user('id'));
            $roleName = $user['User']['role_name'];
            $attendanceVO["id"] = $userAttendanceId;
            $attendanceVO["session_date"] = date( "Y-m-d", strtotime($attendance['UserAttendance']['session_date']));
            $attendanceVO["hours"] = $attendance['UserAttendance']['hours'];
            $attendanceVO["user_id"] = $attendance['UserAttendance']['user_id'];
            $attendanceVO["children"] = $childrenVO;
        }

        $this->set("attendancesVO", $attendancesVO);
        $this->set("attendance", $attendanceVO);
        $this->set("roleName", $roleName);
        $this->set("children", $children);
        $this->set("childList", $childList);
        $this->set("userClassroom", $userClassroom);
    }

    function exportToCsv($userId){
        $this->viewClass = 'Media';
        $users = $this->User->getUserList();

        //*******clean directory (attendance) and create a new csv***********
        $this->cleanDirectory( WWW_ROOT.'attendance/');

        touch(WWW_ROOT.'attendance/class_attendance'.$this->Sec->user('id').'.csv');
        $fileName = WWW_ROOT.'attendance/class_attendance'.$this->Sec->user('id').'.csv';

        $fp = fopen($fileName, 'w');

        fputcsv($fp, array('First Name', 'Last Name', 'Region', 'University', 'Program', 'Classroom'));
        foreach($users as $userValue){
            if ($userValue['User']['role_name'] == 'TEAM_LEAD' || $userValue['User']['role_name'] == 'CORP_MEMBER') {
                $classroom = $this->Classroom->findById($userValue['User']['classroom_id']);
                $program = $classroom['Program'];
                $university = $this->University->findById($program['university_id']);
                $region = $university['Region'];
                fputcsv($fp, array($userValue['User']['first_name'],$userValue['User']['last_name'],$region['name'],
                    $university['University']['name'],$program['name'],$classroom['Classroom']['name']));
                $userAttendances = $this->UserAttendance->getSessionsByUserId($userValue['User']['id']);
                if ($userAttendances != null) {
                    fputcsv($fp, array('','','','','','','Session Date', 'Hours'));
                    foreach($userAttendances as $userAttendance){
                        fputcsv($fp, array('','','','','','',date("Y-m-d", strtotime($userAttendance['UserAttendance']['session_date'])),
                            $userAttendance['UserAttendance']['hours'],'Child Name', 'Checked'));

                        $userByAttendance = $this->User->findById($userAttendance['UserAttendance']['user_id']);
                        $childList = $this->Child->getChildrenByClassroom($userByAttendance['User']['classroom_id']);

                        foreach($childList as $child){
                            $hasAttendance = $this->UserAttendanceChild->getByUserAttendanceAndChild($userAttendance['UserAttendance']['id'], $child['Child']['id']);
                            if ($hasAttendance) {
                                fputcsv($fp, array('','','','','','','', '',$child['Child']['first_name']. ' '.$child['Child']['last_name'], 1));
                            }else{
                                fputcsv($fp, array('','','','','','','', '',$child['Child']['first_name']. ' '.$child['Child']['last_name'], 0));
                            }

                        }
                        fputcsv($fp, array(''));
                    }
                }
            }
        }

        fclose($fp);
        //*******************************************************************

        $params = array(
            'id'		=>	$fileName,
            'name'		=>	'ClassroomAttendance',
            'extension'	=>	'csv',
            'download'	=>	true,
            'cache'		=>	false,
            'path'		=>	DS
        );
        $this->set($params);

    }

    private function cleanDirectory( $directory ) {
        $files = glob( $directory . '*', GLOB_MARK );
        foreach ($files as $file):
            unlink($file);
        endforeach;
    }


}