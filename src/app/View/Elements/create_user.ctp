<script language="javascript" type="text/javascript" src="/js/jquery-1.7.1.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery-ui-1.8.17.custom.min.js"></script>
<script language="javascript" type="text/javascript" src="/js/jquery.dataTables.min.js"></script>

<div class="modal hide fade" id="createUser">
  <?php echo $this->Form->create('User', array('id'=>'create_user_form', 'action' => 'create')); ?>
  <div class="modal-header">        <h3>Add User</h3>
</div>
  <div class="modal-body">
        <div id="create_user_div" class="">

        <div class="">

        <p>
            <?php echo $this->Form->input('role name:', array('id'=>'role_select', 'options' => array(
                'CORP_MEMBER'=>'Corp Member',
                'TEAM_LEAD'=>'Team Lead',
                'SITE_MANAGER'=>'Site Manager',
                'PROJECT_DIRECTOR'=>'Project Director',
                'NATIONAL_RESEARCH'=>'National Research',
                'ADMIN'=>'Admin'
             ))); ?>
        </p>

        <p id='region_select'>
            <?php echo $this->Form->hidden('role_name', array('id'=>'role_name', 'value'=>$roleName)); ?>
            <?php echo $this->Form->label('region', 'Region:'); ?>
            <?php echo $this->Form->select('region', $allRegions, array('id'=>'user_region_selector', 'empty' => __('Select One'), 'disabled'=>'true')); ?>
        </p>

        <p id='university_select'>
            <?php echo $this->Form->label('university', 'University:'); ?>
            <?php echo $this->Form->select('university', $allUniversities, array('id'=>'user_university_selector', 'empty' => __('Select One'), 'disabled'=>'true')); ?>
        </p>

        <p id='classroom_select'>
            <?php echo $this->Form->label('classroom', 'Classroom:'); ?>
            <?php echo $this->Form->select('classroom', $allClassrooms, array('id'=>'user_classroom_selector', 'empty' => __('Select One'))); ?>
        </p>

        <p>
            <?php echo $this->Form->label('first_name', 'First Name:'); ?>
            <?php echo $this->Form->text('first_name', array('id'=>'create_first_name', 'class'=>'')); ?>
        </p>

        <p>
            <?php echo $this->Form->label('last_name', 'Last Name:'); ?>
            <?php echo $this->Form->text('last_name', array('id'=>'create_last_name', 'class'=>'')); ?>
        </p>

        <p>
            <?php echo $this->Form->label('email', 'Email:'); ?>
            <?php echo $this->Form->text('email', array('id'=>'create_email', 'class'=>'', 'type' => 'email')); ?>
        </p>

        <p>
            <?php echo $this->Form->label('username', 'Username:'); ?>
            <?php echo $this->Form->text('username', array('id'=>'create_username', 'class'=>'')); ?>
        </p>

      <p>
          <?php echo $this->Form->label('password', 'Password:'); ?>
          <?php echo $this->Form->password('password', array('id'=>'create_password', 'class'=> "", 'autocomplete' => 'off')); ?>
          <?php echo $this->Form->error('password', null, array('wrap' => "span")); ?>
      </p>

      <p>
          <?php echo $this->Form->label('password_confirm', 'Confirm Password:'); ?>
          <?php echo $this->Form->password('password_confirm', array('id'=>'create_password_confirm', 'class'=> "", 'autocomplete' => 'off')); ?>
          <?php echo $this->Form->error('password_confirm', null, array('wrap' => "span")); ?>
      </p>

        <div style='display:none' class='message'> <!--  --></div>

        </div>
        </div>
          </div>
  <div class="modal-footer by-center">
    <button class='btn btn-primary submit' type="submit"><?php echo __("Add User") ?></button>
    <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
  </div>
          <?php echo $this->Form->end(); ?>
  </div>

</div>

