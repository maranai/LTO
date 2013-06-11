<div class="modal hide fade" id="updateChildModal">
    <?php echo $this->Form->create('Child', array('id'=>'update_form', 'action' => 'update')); ?>

    <div class="modal-body">

    <div id="update_child_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('child_id', array('id'=>'child_id')); ?>
        <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

        <?php if ($roleName == "TEAM_LEAD" || $roleName == "NATIONAL_RESEARCH" || $roleName == "CORP_MEMBER") { ?>
            <p>
                <?php echo $this->Form->hidden('id_number', array('id'=>'id_number')); ?>
            </p>
        <?php } else { ?>
            <p>
               <?php echo $this->Form->label('id_number', 'ID Number:'); ?>
               <?php echo $this->Form->text('id_number', array('id'=>'id_number', 'class'=>'')); ?>
            </p>
        <?php } ?>

        <p>
            <?php echo $this->Form->label('child_first_name', 'First Name:'); ?>
            <?php if ($roleName == "NATIONAL_RESEARCH") { ?>
                <?php echo $this->Form->text('child_first_name', array('id'=>'child_first_name', 'class'=>'', 'readonly'=>true)); ?>
            <?php } else { ?>
                <?php echo $this->Form->text('child_first_name', array('id'=>'child_first_name', 'class'=>'', 'required' => true)); ?>
            <?php } ?>
        </p>

        <p>
            <?php if ($roleName == "TEAM_LEAD" || $roleName == "NATIONAL_RESEARCH" || $roleName == "CORP_MEMBER") { ?>
                <?php echo $this->Form->hidden('child_last_name', array('id'=>'child_last_name')); ?>
                <?php echo $this->Form->label('child_last_initial', 'Last Initial:'); ?>
                <?php echo $this->Form->text('child_last_initial', array('id'=>'child_last_initial', 'class'=>'', 'readonly'=>true)); ?>
            <?php } else { ?>
                <?php echo $this->Form->label('child_last_name', 'Last Name:'); ?>
                <?php echo $this->Form->text('child_last_name', array('id'=>'child_last_name', 'class'=>'', 'required' => true)); ?>
            <?php } ?>
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
