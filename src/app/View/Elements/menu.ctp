

<?php if ($roleName == "TEAM_LEAD" || $roleName == "CORP_MEMBER" || $roleName == "ADMIN" || $roleName == "SITE_MANAGER") : ?>
    <div class='tabs_menu'>
        <?php if ($roleName == "TEAM_LEAD") { ?>
            <ul class="nav nav-tabs">
                <li id="view_attendances">
                    <a href="/users/home/<?php echo $roleName;?>" class='view_attendances'>Child Attendance</a>
                </li>
                <li id="my_attendances">
                    <a href="/userAttendances/home/<?php echo $this->Can->user('id');?>/<?php echo $roleName;?>/null" class='view_users'>My CAT</a>
                </li>
            </ul>
        <?php } ?>
         <?php if ($roleName == "CORP_MEMBER") { ?>
             <ul class="nav nav-tabs">
                 <li id="view_attendances">
                     <a href="/users/home/<?php echo $roleName;?>" class='view_attendances'>Child Attendance</a>
                 </li>
                 <li id="my_attendances">
                     <a href="/userAttendances/home/<?php echo $this->Can->user('id');?>/<?php echo $roleName;?>" class='view_users'>My CAT</a>
                 </li>
             </ul>
         <?php } ?>
         <?php if ($roleName == "SITE_MANAGER") { ?>
             <ul class="nav nav-tabs">
                <li id="view_attendances">
                    <a href="/users/home/<?php echo $roleName;?>" class='view_attendances'>Child Attendance</a>
                </li>
                 <li id="my_attendances">
                     <a href="/userAttendances/home/<?php echo $this->Can->user('id');?>/<?php echo $roleName;?>" class='view_users'>My CAT</a>
                 </li>
                <li id="view_classrooms">
                    <a href="/classrooms/home/<?php echo $roleName;?>" class='view_classrooms'>Classrooms</a>
                </li>
                <li id="view_programs">
                    <a href="/programs/home/<?php echo $roleName;?>" class='view_programs'>Program Partners</a>
                </li>
             </ul>
         <?php } ?>
        <?php if ($roleName == "ADMIN") { ?>
			<ul class="nav nav-tabs">
                <li id="view_attendances">
                    <a href="/users/home/<?php echo $roleName;?>" class='view_attendances'>Child Attendance</a>
                </li>
                <li id="my_attendances">
                    <a href="/userAttendances/home/<?php echo $this->Can->user('id');?>/<?php echo $roleName;?>" class='view_users'>My CAT</a>
                </li>
                <li id="view_classrooms">
                    <a href="/classrooms/home/<?php echo $roleName;?>" class='view_classrooms'>Classrooms</a>
                </li>
                <li id="view_users">
                    <a href="/users/userList/<?php echo $roleName;?>" class='view_users'>Users</a>
                </li>
                <li id="view_programs">
                    <a href="/programs/home/<?php echo $roleName;?>" class='view_programs'>Program Partners</a>
                </li>
                <li id="view_universities">
                    <a href="/universities/home/<?php echo $roleName;?>" class='view_universities'>Universities</a>
                </li>
                <li id='export'>
                     <a href="#" id='exportReport' class='exportReport'> <i class="icon-download-alt"></i>Child Att.</a>
                </li>
                 <li id="class_export">
                      <a href="/userAttendances/exportToCsv/<?php echo $this->Can->user('id');?>" class='class_export'> <i class="icon-download-alt"></i>Class Att.</a>
                 </li>
			</ul>
        <?php } ?>
    </div>
<?php endif; ?>


<div class="modal hide fade" id="selectReport">
    <?php echo $this->Form->create('User', array('id'=>'select_report_form', 'action' => 'exportToCsv', 'method' => 'post')); ?>

    <div class="modal-body">

    <div id="select_report_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('role_name', array('id'=>'role_name', 'value'=>$roleName)); ?>

        <p>
            <p>Please select the report type:</p>
        </p>

        <p>
            <?php echo $this->Form->input('report type:', array('options' => array(
                'bySession'=>'By Session',
                'byDate'=>'By Date'
                ))); ?>
        </p>

       </div>

    </div>
  </div>
  <div class="modal-footer by-center">
    <button class='btn btn-primary' type="submit" id="create_report_button"><?php echo __("Create") ?></button>
    <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
  </div>
  <?php echo $this->Form->end(); ?>
</div>

<?php 
    // ugly walkaround to set the active tab element
    if(empty($active_item) || !$active_item){
        $active_item = null;
    }

    $script = "<script>document.getElementById('".$active_item."').className='active';</script>";
    echo $script;
?>
