<div class="modal hide fade" id="createProgram">
    	<?php echo $this->Form->create('Program', array('id'=>'create_program_form', 'action' => 'create', 'method' => 'post')); ?>
<div class="modal-header">
  <h3>Add Program</h3>
</div>
  <div class="modal-body">

        <div id="create_program_div" class="">

        <div class="">

        <p id='university_select'>
            <?php echo $this->Form->hidden('role_name', array('id'=>'role_name', 'value'=>$roleName)); ?>
            <?php echo $this->Form->label('university', 'University:'); ?>
            <?php echo $this->Form->select('university', $allUniversities, array('id'=>'university_selector', 'empty' => __('Select One'))); ?>
        </p>

        <p>
            <?php echo $this->Form->label('name', 'Name:'); ?>
            <?php echo $this->Form->text('name', array('id'=>'name', 'class'=>'', 'required' => true)); ?>
        </p>

        <div style='display:none' class='message'> <!--  --></div>

        </div>
        </div>
          </div>
      <div class="modal-footer by-center">
        <button class='btn btn-primary submit' type="submit"><?php echo __("Add Program") ?></button>
        <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
      </div>
          <?php echo $this->Form->end(); ?>
  </div>

</div>
