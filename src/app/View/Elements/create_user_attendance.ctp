<div class="modal hide fade" id="createUserAssistance">
    	<?php echo $this->Form->create('UserAttendance', array('id'=>'create_user_attendance_form', 'action' => 'create', 'method' => 'post')); ?>

  <div class="modal-body">

        <div id="create_assistance_div" class="">

            <div class="">
                <?php echo $this->Form->hidden('role_name', array('id'=>'role_name', 'value'=>$roleName)); ?>

                <p>
                    <?php echo $this->Form->label('user_attendance_date', 'Date:'); ?>
                    <?php echo $this->Form->text('user_attendance_date', array('id'=>'user_attendance_date', 'class'=>'')); ?>
                </p>

                <p>
                    <?php echo $this->Form->label('hours', 'Hours:'); ?>
                    <?php echo $this->Form->number('hours', array('id'=>'hours', 'placeholder'=>'0')); ?>
                </p>

                <div style='display:none' class='message'> <!--  --></div>

                </div>
            </div>

            <p>Children:</p>
            <div class='children_scroll_div offset1 span10 tabs_body row-fluid'>
                <table id='child_list' class="table table-condensed table-striped">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th></th>
                    </tr>
                    <?php
                    $checkIndex = 1;
                    foreach ($childList as $child): ?>
                        <tr>
                            <?php echo $this->Form->hidden('child'.$checkIndex,array('value'=>$child["Child"]["id"])); ?>
                            <td><?=$child["Child"]["first_name"];?></td>
                            <td><?=substr($child['Child']['last_name'], 0, 1);?></td>
                            <td>
                                 <?php echo $this->Form->input('check'.$checkIndex,array('type'=>'checkbox', 'label' => ''));?>
                            </td>
                        </tr>
                    <?php
                    $checkIndex++;
                    endforeach; ?>
                    <?php echo $this->Form->hidden('total_check',array('value'=>$checkIndex)); ?>
                </table>
            </div>

        </div>

  <div class="modal-footer by-center">
    <button class='btn btn-primary submit' type="submit"><?php echo __("Add Attendance") ?></button>
    <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
  </div>

  <?php echo $this->Form->end(); ?>
  </div>

</div>
