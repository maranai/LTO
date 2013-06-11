<div class="modal hide fade" id="updateAttendanceModal">
    <?php echo $this->Form->create('Attendance', array('id'=>'update_attendance_form', 'action' => 'update', 'method' => 'post')); ?>

    <div class="modal-body">

    <div id="update_child_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('attendance_id', array('id'=>'attendance_id')); ?>
        <?php echo $this->Form->hidden('attendance_child_id', array('id'=>'attendance_child_id')); ?>
        <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

        <p>
            <?php echo $this->Form->label('attendance_number', 'Number:'); ?>
            <?php echo $this->Form->input('attendance_number', array('id'=>'attendance_number', 'class'=>'',
            'options' => array(
                '1a'=>'1a',
                '1b'=>'1b',
                '2a'=>'2a',
                '2b'=>'2b',
                '3a'=>'3a',
                '3b'=>'3b',
                '4a'=>'4a',
                '4b'=>'4b',
                '5a'=>'5a',
                '5b'=>'5b',
                '6a'=>'6a',
                '6b'=>'6b',
                '7a'=>'7a',
                '7b'=>'7b',
                '8a'=>'8a',
                '8b'=>'8b',
                '9a'=>'9a',
                '9b'=>'9b',
                '10a'=>'10a',
                '10b'=>'10b',
                '11a'=>'11a',
                '11b'=>'11b',
                '12a'=>'12a',
                '12b'=>'12b',
                '13a'=>'13a',
                '13b'=>'13b',
                '14a'=>'14a',
                '14b'=>'14b',
                '15a'=>'15a',
                '15b'=>'15b',
                '16a'=>'16a',
                '16b'=>'16b',
                '17a'=>'17a',
                '17b'=>'17b',
                '18a'=>'18a',
                '18b'=>'18b',
                '19a'=>'19a',
                '19b'=>'19b',
                '20a'=>'20a',
                '20b'=>'20b'
                ))); ?>
        </p>

        <p>
            <?php echo $this->Form->label('attendance_date_update', 'Date:'); ?>
            <?php echo $this->Form->text('attendance_date_update', array('id'=>'attendance_date_update', 'class'=>'')); ?>
        </p>

		<div style='display:none' class='message'>

		</div>

       </div>

    </div>
  </div>
  <div class="modal-footer by-center">
    <button class='btn btn-primary submit' type="submit"><?php echo __("Update") ?></button>
    <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
  </div>
  <?php echo $this->Form->end(); ?>
</div>
