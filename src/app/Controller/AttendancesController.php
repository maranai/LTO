<?php
/**
 * User: eblanco
 * Date: 3/26/13
 * Time: 9:41 AM
 */

App::uses('CakeEmail', 'Network/Email');
App::uses('File', 'Utility');
App::uses('Folder', 'Utility');

class AttendancesController extends AppController
{

    public $uses = array('User', 'Classroom', 'Attendance', 'Program', 'University', 'Region');

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
        $this->view='json';
        $attendance = $this->data;

        if (!empty($attendance)) {
            $childAttendance = $this->Attendance->getSessionByNumberAndChild( $attendance['Attendance']['child_id'],
                $attendance['Attendance']['session number:']);
            if ($childAttendance == null) {
                $assisted = $attendance['Attendance']['attended?'];
                $childId = $attendance['Attendance']['child_id'];
                //$hours = $attendance['Attendance']['hours'];
                $sessionDate = $attendance['Attendance']['attendance_date'];
                $number = $attendance['Attendance']['session number:'];

                $attendanceData = array('session_number' => $number, 'session_date' => $sessionDate,
                    'child_id' => $childId, 'assisted' => $assisted);

                $this->Attendance->save($attendanceData);
                $response = array('success' => true);
            }else{
                $response = array('success' => false, 'message' => 'The session number already exists');
            }

            $this->renderJson($response);
            //$this->redirect( array( 'controller' => 'users', 'action' => 'home', $attendance['Attendance']['role_name'] ));
        }
    }

    function update(){
        $this->view='json';
        $attendance = $this->data;

        if (!empty($this->data)) {
            $childAttendance = $this->Attendance->getSessionByNumberAndChild( $attendance['Attendance']['attendance_child_id'],
                $attendance['Attendance']['attendance_number']);

            if ($childAttendance == null || $childAttendance['Attendance']['id'] == $attendance['Attendance']['attendance_id']) {
                $id = $attendance['Attendance']['attendance_id'];
                $number = $attendance['Attendance']['attendance_number'];
                $attendanceDate = $attendance['Attendance']['attendance_date_update'];
                //$hours = $attendance['Attendance']['attendance_hours'];
                $childId = $attendance['Attendance']['attendance_child_id'];
                $roleName = $attendance['Attendance']['user_role_name'];

                $attendance = $this->Attendance->findById( $id );
                $attendance['Attendance']['session_number'] = $number;
                $attendance['Attendance']['session_date'] = date( "Y-m-d", strtotime( $attendanceDate ) );
                //$attendance['Attendance']['hours'] = $hours;
                $attendance['Attendance']['child_id'] = $childId;
                $this->Attendance->save( $attendance, array( "session_number", "child_id") );
                $response = array('success' => true);
            }else{
                $response = array('success' => false, 'message' => 'The session number already exists');
            }

            $this->renderJson($response);

        }
    }

    function delete(){
        $attendance = $this->data;

        if (!empty($this->data)) {
            $id = $attendance['Attendance']['delete_attendance_id'];
            $roleName = $attendance['Attendance']['user_role_name'];

            $currentAttendance = $this->Attendance->findById( $id );
            $this->Attendance->delete( $currentAttendance["Attendance"]["id"] );

            $this->redirect( array( 'controller' => 'users', 'action' => 'home', $roleName ));
        }
    }

/**
 * attendancesByChild
 * @param  INT $childId 
 * @param  STRING $roleName
 *
 * TODO: Separate logic from view.
 */
    public function attendancesByChild($childId, $roleName){
        $this->layout = 'ajax';
        $this->autoRender = false;

        if ($roleName != 'NATIONAL_RESEARCH') {
            $attendances = $this->Attendance->getSessionsByChildId($childId);
            if ($attendances!=null) {
                $row = null;
                $header = "<table class='attendance_table table table-condensed table-striped'><thead class='child'><th><b>Nº</b></th><th><b>Date</b></th><th><b>Attended?</b></th>";
                if ($roleName == 'TEAM_LEAD') {
                    $header = $header."<th></th></tr>";
                }else{
                    $header = $header."</thead>";
                }

                $totalAttendances = count($attendances);
                $rowNumber = 0;
                foreach($attendances as $attendance){
                    $rowNumber = $rowNumber + 1;
                    $id = $attendance["Attendance"]["id"];
                    $number  = $attendance["Attendance"]["session_number"];
                    $sessionDate  = date( "Y-m-d", strtotime( $attendance["Attendance"]["session_date"]  ));
                    $year = date( "Y", strtotime( $attendance["Attendance"]["session_date"] ) );
                    $month = date( "m", strtotime( $attendance["Attendance"]["session_date"] ) );
                    $day = date( "d", strtotime( $attendance["Attendance"]["session_date"] ) );
                    $assisted = null;
                    if ($attendance["Attendance"]["assisted"] == 1) {
                        $assisted = "<i class='icon-ok assisted'></i>";
                    }else{
                        $assisted = "<i class='icon-remove no_assisted'></i>";
                    }
                    $childId  = $attendance["Attendance"]["child_id"];

                    $enabledUpdateAttendance = ($attendance["Attendance"]["id"] >= 1) ? "updateAttendance" : "disabled";
                    $updateAttendanceLink = "<li onclick='javascript:updateAttendance($id, \"".$number."\", $year, $month, $day, $childId);' id='update_attendance'><a class='".$enabledUpdateAttendance."' href='#'>". _('Update')."</a></li>";
                    $enabledDeleteAttendance = ($attendance["Attendance"]["id"] >= 1) ? "deleteAttendance" : "disabled";
                    $deleteAttendanceLink = "<li onclick='deleteAttendance($id);' id='delete_attendance'><a data-attendanceId='".$attendance["Attendance"]["id"]."' class='".$enabledDeleteAttendance."' href='#'>". _('Delete')."</a></li>";

                    $row = $row . "<tr class='child'><td>$number</td><td>$sessionDate</td><td class='assitance'>$assisted</td>";
                    if ($roleName == 'TEAM_LEAD'  || $roleName == 'SITE_MANAGER' || $roleName == 'PROJECT_DIRECTOR' || $roleName == 'ADMIN') {
                        if ($roleName != 'TEAM_LEAD' || ($roleName == 'TEAM_LEAD' && $rowNumber == $totalAttendances)) {
                            $row = $row . "<td><div class='dropdown'>
                                        <a class='dropdown-toggle $id' $id data-toggle='dropdown'>
                                            <img src='/img/glyphicons_136_cogwheel.png'>
                                            <span class='caret'></span>
                                        </a>
                                        <ul class='dropdown-menu' role='menu' aria-labelledby='dLabel'>
                                            $updateAttendanceLink
                                            $deleteAttendanceLink
                                        </ul>
                                    </div></td></tr>";
                        }else{
                                $row = $row . "<td><div class='dropdown'>
                                    <a class='dropdown-toggle $id' $id data-toggle='dropdown'>
                                        <img src='/img/glyphicons_136_cogwheel.png'>
                                        <span class='caret'></span>
                                    </a>
                                    <ul class='dropdown-menu' role='menu' aria-labelledby='dLabel'>
                                        $deleteAttendanceLink
                                    </ul>
                                </div></td></tr>";
                        }
                    }else{
                        $row = $row . "</tr>";
                    }

                }
                $row = $row . "</table>";
                $details = $header . $row;
                return $details;
            }
        }else{
            return null;
        }
    }

}