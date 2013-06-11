<div class="modal hide fade" id="createChild">
    <?php echo $this->Form->create('Child', array('id'=>'create_child_form', 'action' => 'create')); ?>

    <div class="modal-header">
                <h3>Add Child</h3>

    </div>
  <div class="modal-body">

        <div id="create_child_div" class="">

        <div class="">

        <?php echo $this->Form->hidden('role_name', array('id'=>'role_name', 'value'=>$roleName)); ?>

        <?php if ($roleName == "SITE_MANAGER" || $roleName == "PROJECT_DIRECTOR" || $roleName == "ADMIN") { ?>
            <p id='classroom_select'>
                <?php echo $this->Form->label('classroom_id', 'Classroom:'); ?>
                <?php echo $this->Form->select('classroom_id', $userClassroom, array('id'=>'classroom_selector', 'required' => true, 'empty' => __('Select One'))); ?>
            </p>
        <?php } else {?>
            <?php echo $this->Form->hidden('classroom_id', array('id'=>'classroom_id', 'value'=>$userClassroom['Classroom']['id'])); ?>
        <?php } ?>

        <?php if ($roleName != "TEAM_LEAD") { ?>
            <p>
                <?php echo $this->Form->label('id_number', 'ID Number:'); ?>
                <?php echo $this->Form->text('id_number', array('class'=>'')); ?>
            </p>
        <?php } else {?>
             <?php echo $this->Form->hidden('id_number', array('id'=>'id_number')); ?>
        <?php } ?>

        <p>
            <?php echo $this->Form->label('first_name', 'First Name:'); ?>
            <?php echo $this->Form->text('first_name', array('id'=>'first_name', 'class'=>'', 'required' => true)); ?>
        </p>

        <p>
            <?php echo $this->Form->label('last_name', 'Last Name:'); ?>
            <?php echo $this->Form->text('last_name', array('id'=>'last_name', 'class'=>'', 'required' => true)); ?>
        </p>

        <div style='display:none' class='message'> <!--  --></div>

        </div>
        </div>
          </div>
  <div class="modal-footer by-center">
    <button class='btn btn-primary submit' type="submit"><?php echo __("Add Child") ?></button>
    <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
  </div>
          <?php echo $this->Form->end(); ?>
  </div>

</div>
