<div class="modal"  id="updateUserAttendanceModal">
    <?php echo $this->Form->create('UserAttendance', array('id'=>'update_user_attendance_form', 'action' => 'updateUserAttendance')); ?>
    <div class="modal-body">

    <div id="update_attendance_div" class="classes">

        <div class="">

            <?php echo $this->Form->hidden('attendance_id', array('id'=>'attendance_id', 'value'=>$attendance['id'])); ?>
            <?php echo $this->Form->hidden('attendance_user_id', array('id'=>'attendance_user_id', 'value'=>$attendance['user_id'])); ?>
            <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

             <p>
                <?php echo $this->Form->label('attendance_date_update', 'Date:'); ?>
                <?php echo $this->Form->date('attendance_date_update', array('id'=>'attendance_date_update', 'value'=>$attendance['session_date'], 'class'=>'', 'required' => true)); ?>
            </p>

            <p>
                <?php echo $this->Form->label('attendance_hours', 'Hours:'); ?>
                <?php echo $this->Form->text('attendance_hours', array('id'=>'attendance_hours', 'value'=>$attendance['hours'], 'class'=>'', 'required' => true)); ?>
            </p>

            <p>Children:</p>
            <div class='children_scroll_div  offset1 span10 tabs_body row-fluid'>
                <table id='update_child_list' class="table table-condensed table-striped">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th></th>
                    </tr>
                    <?php
                    $checkIndex = 1;
                    foreach ($attendance['children'] as $child): ?>
                        <tr>
                            <?php echo $this->Form->hidden('child'.$checkIndex,array('value'=>$child["id"])); ?>
                            <td><?=$child["firstName"];?></td>
                            <td><?=substr($child['lastName'], 0, 1);?></td>
                            <td>
                                 <?php if ($child["hasAttendance"] == 0) : ?>
                                    <?php echo $this->Form->input('check'.$checkIndex,array('type'=>'checkbox', 'label' => ''));?>
                                 <?php else : ?>
                                    <?php echo $this->Form->input('check'.$checkIndex,array('type'=>'checkbox', 'checked'=>true, 'label' => ''));?>
                                 <?php endif; ?>
                            </td>
                        </tr>
                    <?php
                    $checkIndex++;
                    endforeach; ?>
                    <?php echo $this->Form->hidden('total_check',array('value'=>$checkIndex)); ?>
                </table>
            </div>

            <div style='display:none' class='message'>

		</div>

       </div>

    </div>
  </div>
  <div class="modal-footer">
    <button id="update_user_attendance_button" class='btn btn-primary submit' type="submit"><?php echo __("Update") ?></button>
    <a href="#" class="btn" data-dismiss="modal" id="update_attendance_button">Cancel</a>
  </div>
  <?php echo $this->Form->end(); ?>
</div>


