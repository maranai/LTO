
<div class="modal hide fade" id="editProfileModal">
    <?php echo $this->Form->create('User', array('action' => 'update', 'class'=>'form-horizontal')); ?>
    <div class="modal-body">

    <div id="update_user_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('profile_user_id', array('id'=>'profile_user_id')); ?>

        <p>
            <?php echo $this->Form->label('profile_user_first_name', 'First Name:'); ?>
            <?php echo $this->Form->text('profile_user_first_name', array('id'=>'profile_user_first_name', 'class'=>'')); ?>
        </p>

        <p>
            <?php echo $this->Form->label('profile_user_last_name', 'Last Name:'); ?>
            <?php echo $this->Form->text('profile_user_last_name', array('id'=>'profile_user_last_name', 'class'=>'')); ?>
        </p>

        <p>
            <?php echo $this->Form->label('profile_user_email', 'Email:'); ?>
            <?php echo $this->Form->text('profile_user_email', array('id'=>'profile_user_email', 'class'=>'')); ?>
        </p>

    <div class="profile_password_change" id="profile_password_change">
      <strong>●●●●●●</strong> &nbsp;&nbsp;
      <?php echo $this->Html->link(__("Change Password"), '#', array('class'=>'change_pass')); ?>
    </div>

    <div class="profile_password_change_edit ">
        <?php echo $this->Form->password('profile_password_old', array('id' => 'profile_password_old', 'placeholder'=>'Current Password')); ?>
<br><br>
        <?php echo $this->Form->password('profile_password', array('id' => 'profile_password', 'placeholder'=>'New Password')); ?>
<br><br>
        <?php echo $this->Form->password('profile_password_confirm', array('id' => 'profile_password_confirm', 'placeholder'=>'Confirm New Password')); ?>
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