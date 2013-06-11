
<div class="modal hide fade" id="deleteChildModal">
    <?php echo $this->Form->create('Child', array('id'=>'delete_child_form', 'action' => 'delete', 'method' => 'post')); ?>

    <div class="modal-body">

    <div id="delete_child_div" class=" classes">

        <div class="">

        <?php echo $this->Form->hidden('delete_child_id', array('id'=>'delete_child_id')); ?>
        <?php echo $this->Form->hidden('user_role_name', array('id'=>'user_role_name', 'value'=>$roleName)); ?>

        <p>
            <p>Please confirm that you want to delete this Child.</p>
            <p>Deleting this child all their attendances will be deleted.</p>
        </p>

       </div>

    </div>
  </div>
  <div class="modal-footer by-center">
    <button class='btn btn-primary' type="submit" id="delete_child_button"><?php echo __("Delete") ?></button>
    <a href="#" class="btn btn-cancel" data-dismiss="modal">Cancel</a>
  </div>
  <?php echo $this->Form->end(); ?>
</div>