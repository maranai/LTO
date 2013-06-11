<!-- programs/home.ctp -->
<div class='offset1 span10 tabs_body row-fluid'>

<?php echo $this->element('menu', array('active_item'=>'view_programs')); ?>
    <div class="scroll_div table_wrapper">

    <?php if ($roleName == "ADMIN" || $roleName == "SITE_MANAGER") { ?>
        <div class="btn-group pull-right">
          <button id='create_program' class='create_program btn'><i class="icon-pencil"></i>Add Program Partner</button>
        </div>
     <?php } ?>

    <table id='program_list' class="table table-condensed table-striped">
        <thead>
            <th>Name</th>
            <th>University</th>
            <th></th>
        </thead>
        <tbody>
        <?php foreach ($programsVO as $programVO): ?>
            <?php
            $enabledUpdateProgram = ($programVO["id"] >= 1) ? "updateProgram" : "disabled";
            $updateProgramLink = "<li id='update_program'><a data-programId='".$programVO["id"]."' data-programName='".$programVO["name"]."' data-universityId='".$programVO["universityId"]."' class='".$enabledUpdateProgram."' href='#'>". _('Update')."</a></li>";
            ?>

            <tr>
                <td><?=$programVO["name"];?></td>
                <td><?=$programVO["universityName"];?></td>
                <td>
                    <div class="dropdown">

                        <a class="dropdown-toggle <?php echo $programVO["id"]; ?>" <?php echo $programVO["id"]; ?> data-toggle="dropdown">
                            <span class='icon_cogwheel'></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <?php echo $updateProgramLink; ?>
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
<?php echo $this->element('update_program'); ?>
<?php echo $this->element('create_user'); ?>

