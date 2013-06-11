<div class="modal hide fade" id="updateProgramModal">
    <?php echo $this->Form->create('Program', array('id'=>'update_program_form', 'action' => 'update', 'method' => 'post')); ?>

    <div class="modal-body">

    <div id="update_program_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('program_id', array('id'=>'program_id')); ?>
        <?php echo $this->Form->hidden('university_id', array('id'=>'university_id')); ?>
        <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

        <p>
            <?php echo $this->Form->label('program_name', 'Name:'); ?>
            <?php echo $this->Form->text('program_name', array('id'=>'program_name', 'class'=>'')); ?>
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
