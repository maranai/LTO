<div class="modal hide fade" id="deleteUserModal">
    <?php echo $this->Form->create('User', array('id'=>'delete_user_form', 'action' => 'delete', 'method' => 'post')); ?>

    <div class="modal-body">

    <div id="delete_user_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('delete_user_id', array('id'=>'delete_user_id')); ?>
        <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

        <p>
            <p>Please confirm that you want to delete this User.</p>
        </p>

       </div>

    </div>
  </div>
  <div class="modal-footer">
    <button class='btn btn-primary' type="submit" id="delete_user_button"><?php echo __("Delete") ?></button>
    <a href="#" class="btn" data-dismiss="modal">Cancel</a>
  </div>
  <?php echo $this->Form->end(); ?>
</div>
