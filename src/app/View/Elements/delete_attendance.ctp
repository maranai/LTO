<div class="modal hide fade" id="deleteAttendanceModal">
    <?php echo $this->Form->create('Attendance', array('id'=>'delete_attendance_form', 'action' => 'delete', 'method' => 'post')); ?>

    <div class="modal-body">

    <div id="delete_attendance_div" class="classes">

        <?php echo $this->Form->hidden('delete_attendance_id', array('id'=>'delete_attendance_id')); ?>
        <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

        <p>
            <p>Please confirm that you want to delete this attendance.</p>
        </p>

    </div>
  </div>
  <div class="modal-footer by-center">
    <button class='btn btn-primary submit' type="submit"><?php echo __("Delete") ?></button>
    <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
  </div>
  <?php echo $this->Form->end(); ?>
</div> 