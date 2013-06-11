<!-- classrooms/home.ctp -->
<div class='offset1 span10 tabs_body row-fluid'>

<?php echo $this->element('menu', array('active_item'=>'view_classrooms')); ?>
    <div class="scroll_div table_wrapper">

    <?php if ($roleName == "ADMIN" || $roleName == "SITE_MANAGER") { ?>
        <div class="btn-group pull-right">
          <button id='create_classroom' class='create_classroom btn'><i class="icon-pencil"></i> Add Classroom</button>
        </div>
     <?php } ?>

    <table id='classroom_list' class="table table-condensed table-striped">
        <thead>
            <th>Name</th>
            <th>Program</th>
            <th></th>
        </thead>
        <tbody>
        <?php foreach ($classroomsVO as $classroomVO): ?>
            <?php
            $enabledUpdateClassroom = ($classroomVO["id"] >= 1) ? "updateClassroom" : "disabled";
            $updateClassroomLink = "<li id='update_classroom'><a data-classroomId='".$classroomVO["id"]."' data-classroomName='".$classroomVO["name"]."' data-programId='".$classroomVO["programId"]."' class='".$enabledUpdateClassroom."' href='#'>". _('Update')."</a></li>";
            ?>

            <tr>
                <td><?=$classroomVO["name"];?></td>
                <td><?=$classroomVO["programName"];?></td>
                <td>
                    <div class="dropdown">

                        <a class="dropdown-toggle <?php echo $classroomVO["id"]; ?>" <?php echo $classroomVO["id"]; ?> data-toggle="dropdown">
                            <span class='icon_cogwheel'></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <?php echo $updateClassroomLink; ?>
                        </ul>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<?php echo $this->element('create_program'); ?>
<?php echo $this->element('create_university'); ?>
<?php echo $this->element('create_user'); ?>

<div class="modal hide fade" id="createClassroom">
    	<?php echo $this->Form->create('Classroom', array('id'=>'create_classroom_form', 'action' => 'create', 'method' => 'post')); ?>
<div class="modal-header">
  <h3>Add Classroom</h3>
</div>
  <div class="modal-body">

        <div id="create_classroom_div" class="">

        <div class="">

        <p id='program_select'>
            <?php echo $this->Form->hidden('role_name', array('id'=>'role_name', 'value'=>$roleName)); ?>
            <?php echo $this->Form->label('program', 'Program Partner:'); ?>
            <?php echo $this->Form->select('program', $allPrograms, array('id'=>'program_selector', 'empty' => __('Select One'))); ?>
        </p>

        <p>
            <?php echo $this->Form->label('name', 'Name:'); ?>
            <?php echo $this->Form->text('name', array('id'=>'class_name', 'class'=>'', 'required' => true)); ?>
        </p>

        <div style='display:none' class='message'> <!--  --></div>

        </div>
        </div>
          </div>
      <div class="modal-footer by-center">
        <button class='btn btn-primary submit' type="submit"><?php echo __("Add Classroom") ?></button>
        <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
      </div>
          <?php echo $this->Form->end(); ?>
  </div>

</div>


<div class="modal hide fade" id="updateClassroomModal">
    <?php echo $this->Form->create('Classroom', array('id'=>'update_classroom_form', 'action' => 'update', 'method' => 'post')); ?>

    <div class="modal-body">

    <div id="update_classroom_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('classroom_id', array('id'=>'classroom_id')); ?>
        <?php echo $this->Form->hidden('program_id', array('id'=>'program_id')); ?>
        <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

        <p>
            <?php echo $this->Form->label('classroom_name', 'Name:'); ?>
            <?php echo $this->Form->text('classroom_name', array('id'=>'classroom_name', 'class'=>'')); ?>
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

