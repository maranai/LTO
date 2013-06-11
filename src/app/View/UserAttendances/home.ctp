<!-- UserAttendances/home.ctp -->


<div class='offset1 span10 tabs_body row-fluid'>

    <?php echo $this->element('menu', array('active_item'=>'my_attendances')); ?>
    <div class="scroll_div table_wrapper">

    <?php if ($roleName != "SITE_MANAGER" && $roleName != "ADMIN") { ?>
        <div class="btn-group pull-right">
          <button id='create_user_attendance' class='btn create_user_attendance'>Add Attendance</button>
        </div>
    <?php } ?>

    <table id='user_attendance_list' class="table table-condensed table-striped">
        <thead>
            <?php if ($roleName == "SITE_MANAGER" || $roleName == 'ADMIN') { ?>
                <th>First Name</th>
                <th>Last Name</th>
            <?php } ?>
            <th>Date</th>
            <th>Hours</th>
            <th></th>
        </thead>
        <tbody>
        <?php if ($attendancesVO != null) { ?>
            <?php foreach ($attendancesVO as $attendanceVO): ?>
                <?php
                $userAttendanceId = $attendanceVO["id"];
                $link = $this->Html->url(array('controller' => 'userAttendances', 'action' => 'update', $userAttendanceId), true);
                $enabledUpdateAttendance = ($attendanceVO["id"] >= 1) ? "updateUserAttendance" : "disabled";
                $updateAttendanceLink = "<li id='update_user_attendance'><a class='".$enabledUpdateAttendance."' href=$link>". _('Update')."</a></li>";
                $enabledDeleteAttendance = ($attendanceVO["id"] >= 1) ? "deleteUserAttendance" : "disabled";
                $deleteLink = "<li id='delete_user_attendance'><a data-attendanceId='".$attendanceVO["id"]."' class='".$enabledDeleteAttendance."' href='#'>". _('Delete')."</a></li>";

                ?>

                <tr>
                    <?php if ($roleName == "SITE_MANAGER" || $roleName == 'ADMIN') { ?>
                        <td><?=$attendanceVO["firstName"];?></td>
                        <td><?=$attendanceVO["lastName"];?></td>
                    <?php } ?>
                    <td><?=$attendanceVO["sessionDate"];?></td>
                    <td><?=$attendanceVO["hours"];?></td>
                    <td>
                        <div class="dropdown">

                            <a class="dropdown-toggle <?php echo $attendanceVO["id"]; ?>" <?php echo $attendanceVO["id"]; ?> data-toggle="dropdown">
                                <span class='icon_cogwheel'></span>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dLabel">
                                <?php echo $updateAttendanceLink; ?>
                                <?php echo $deleteLink; ?>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php } ?>
        </tbody>
    </table>
</div>
</div>


<div class="modal hide fade" id="deleteUserAttendanceModal">
    <?php echo $this->Form->create('UserAttendance', array('id'=>'delete_user_attendance_form', 'action' => 'delete', 'method' => 'post')); ?>

    <div class="modal-body">

    <div id="delete_attendance_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('delete_attendance_id', array('id'=>'delete_attendance_id')); ?>
        <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

        <p>
            <p>Please confirm that you want to delete this attendance.</p>
        </p>

       </div>

    </div>
  </div>
  <div class="modal-footer">
    <button class='btn btn-primary' type="submit" id="delete_attendance_button"><?php echo __("Delete") ?></button>
    <a href="#" class="btn" data-dismiss="modal">Cancel</a>
  </div>
  <?php echo $this->Form->end(); ?>
</div>

<?php
    echo $this->Session->flash('flash', array('element' => 'update_user_attendance'));
?>
<?php echo $this->element('create_attendance'); ?>
<?php echo $this->element('create_child'); ?>
<?php echo $this->element('create_user_attendance'); ?>

