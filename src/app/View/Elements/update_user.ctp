<script language="javascript" type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery-ui-1.8.17.custom.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.dataTables.min.js"></script>

<div class="modal hide fade" id="updateUserModal">
    <?php echo $this->Form->create('User', array('action' => 'update')); ?>
    <div class="modal-body">

    <div id="update_user_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('user_id', array('id'=>'user_id')); ?>
        <?php echo $this->Form->hidden('user_classroom_id', array('id'=>'user_classroom_id')); ?>
        <?php echo $this->Form->hidden('user_university_id', array('id'=>'user_university_id')); ?>
        <?php echo $this->Form->hidden('user_region_id', array('id'=>'user_region_id')); ?>
        <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

        <p>
            <?php echo $this->Form->label('user_first_name', 'First Name:'); ?>
            <?php echo $this->Form->text('user_first_name', array('id'=>'user_first_name', 'class'=>'')); ?>
        </p>

        <p>
            <?php echo $this->Form->label('user_last_name', 'Last Name:'); ?>
            <?php echo $this->Form->text('user_last_name', array('id'=>'user_last_name', 'class'=>'')); ?>
        </p>

        <p>
            <?php echo $this->Form->label('user_name', 'Username:'); ?>
            <?php echo $this->Form->text('user_name', array('id'=>'user_name', 'class'=>'')); ?>
        </p>

        <p>
            <?php echo $this->Form->label('user_email', 'Email:'); ?>
            <?php echo $this->Form->text('user_email', array('id'=>'user_email', 'class'=>'')); ?>
        </p>

		<div class="password_change" id="password_change">
			<strong>●●●●●●</strong> &nbsp;&nbsp;
			<?php echo $this->Html->link(__("Change Password"), '#', array('class'=>'change_pass')); ?>
		</div>

		<div class="password_change_edit">
		    <?php echo $this->Form->password('password_old', array('id' => 'password_old', 'placeholder'=>'Current Password')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <?php echo $this->Form->password('password', array('id' => 'password', 'placeholder'=>'New Password')); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <?php echo $this->Form->password('password_confirm', array('id' => 'password_confirm', 'placeholder'=>'Confirm New Password')); ?>
		</div>

		<div style='display:none' class='message'></div>

       </div>

    </div>
  </div>
  <div class="modal-footer by-center">
    <button class='btn btn-primary submit' type="submit"><?php echo __("Submit") ?></button>
    <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
  </div>
  <?php echo $this->Form->end(); ?>
</div>

<script type="text/javascript">

    $("#updateUserModal form").submit(function(e){
        e.preventDefault();
        var self = this;
        var data = $(self).serialize();
        $.post('/users/update', data, function(data){
            if(data.message != null){
                //alert(data.message);
                $('.message').show();
                $('.message', self).removeClass('hidden').html(data.message)
            }else{
                $('#updateUserModal').modal('hide');
            }
        }, 'json')
    });

</script>
