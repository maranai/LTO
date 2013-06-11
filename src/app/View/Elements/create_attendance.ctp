<div class="modal hide fade" id="createAssistance">
   <?php echo $this->Form->create('Attendance', array('id'=>'create_attendance_form', 'action' => 'create')); ?>

   <div class="modal-header"><h3>Add Attendance</h3></div>
   <div class="modal-body">

    <div id="create_assistance_div" class="">


        <div class="">
            <?php echo $this->Form->hidden('role_name', array('id'=>'role_name', 'value'=>$roleName)); ?>
        </p>

        <p id='children_select'>
            <p>
                <?php echo $this->Form->label('child_id', 'Child:'); ?>
                <?php echo $this->Form->select('child_id', $children, array('id'=>'children_selector', 'empty' => __('Select One'))); ?>
            </p>

            <p>
                <?php echo $this->Form->label('attendance_date', 'Date:'); ?>
                <?php echo $this->Form->text('attendance_date', array('id'=>'attendance_date', 'class'=>'')); ?>
            </p>

            <p>
                <?php echo $this->Form->input('session number:', array('options' => array(
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

        <!-- <p>
            <?php echo $this->Form->label('hours', 'Hours:'); ?>
            <?php echo $this->Form->text('hours', array('class'=>'', 'type' => 'numeric')); ?>
        </p> -->

        <p>
            <?php echo $this->Form->input('attended?', array('options' => array(
                '1'=>'Yes',
                '0'=>'No'
                ))); ?>
            </p>

            <div style='display:none' class='message'></div>

        </div>
    </div>
</div>

<div class="modal-footer by-center">
    <button class='btn btn-primary submit' type="submit"><?php echo __("Add Attendance") ?></button>
    <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
</div>
<?php echo $this->Form->end(); ?>
</div>

