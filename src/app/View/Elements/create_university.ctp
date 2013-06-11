<div class="modal hide fade" id="createUniversity">
    	<?php echo $this->Form->create('University', array('id'=>'create_university_form', 'action' => 'create', 'method' => 'post')); ?>
  <div class="modal-header">          
    <h3>Add University</h3>
  </div>
  <div class="modal-body">

        <div id="create_university_div" class="">

        <div class="">

        <p id='region_select'>
            <?php echo $this->Form->hidden('role_name', array('id'=>'role_name', 'value'=>$roleName)); ?>
            <?php echo $this->Form->label('region', 'Region:'); ?>
            <?php echo $this->Form->select('region', $allRegions, array('id'=>'region_selector', 'empty' => __('Select One'))); ?>
        </p>

        <p>
            <?php echo $this->Form->label('name', 'Name:'); ?>
            <?php echo $this->Form->text('name', array('id'=>'university_name', 'class'=>'', 'required' => true)); ?>
        </p>

        <div style='display:none' class='message'> <!--  --></div>

        </div>
        </div>
          </div>
      <div class="modal-footer by-center">
        <button class='btn btn-primary submit' type="submit"><?php echo __("Add University") ?></button>
        <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
      </div>
          <?php echo $this->Form->end(); ?>
  </div>

</div>
