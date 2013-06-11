

<div class='offset1 span10 tabs_body row-fluid'>



<!-- tabs -->
<?php echo $this->element('menu', array('active_item'=>'view_attendances')); ?>

    <div class="scroll_div list_table_wrapper span8">

        <?php if ($roleName == "TEAM_LEAD" || $roleName == "SITE_MANAGER" || $roleName == "PROJECT_DIRECTOR" || $roleName == "ADMIN") { ?>
        <div class="btn-group pull-right">
          <button id='create_child' class='btn create_child'>Add Child</button>
          <button id='create_assistance' class='btn create_assistance'>Add Attendance</button>
        </div>
        <?php } ?>
    
        <table id='children_list' class="table table-striped table-condensed">
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <?php if ($roleName != "TEAM_LEAD" && $roleName != "NATIONAL_RESEARCH" && $roleName != "CORP_MEMBER") { ?>
                    <th>ID</th>
                <?php } ?>
                <th>Region</th>
                <th>University</th>
                <th class="program">Program</th>
                <th>Classroom</th>
                <?php if ($roleName != "NATIONAL_RESEARCH") { ?>
                    <th></th>
                <?php } ?>
            </thead>
            <tbody>
            <?php foreach ($childrenVO as $childVO): ?>

                <?php
                $enabledUpdateChild = ($childVO["id"] >= 1) ? "updateChild" : "disabled";
                $updateLink = "<li id='update_child'><a data-childId='".$childVO["id"]."' data-childFirstName='".$childVO["firstName"]."'  data-childLastName='".$childVO["lastName"]."' data-childLastInitial='".$childVO["lastInitial"]."' data-childIdNumber='".$childVO["IDNumber"]."' class='updateChildEnabler ".$enabledUpdateChild."'>". _('Update')."</a></li>";
                $enabledDeleteChild = ($childVO["id"] >= 1) ? "deleteChild" : "disabled";
                $deleteLink = "<li id='delete_child'><a data-childId='".$childVO["id"]."' class='".$enabledDeleteChild."' href='#'>". _('Delete')."</a></li>";
                ?>

                <tr class="parent" data-id="<?=$childVO["id"];?>" data-role="<?=$roleName;?>">
                    <td><?=$childVO["firstName"];?></td>

                    <?php if ($roleName == "TEAM_LEAD" || $roleName == "NATIONAL_RESEARCH" || $roleName == "CORP_MEMBER") { ?>
                        <td><?=$childVO["lastInitial"];?></td>
                    <?php } else {?>
                        <td><?=$childVO["lastName"];?></td>
                    <?php } ?>

                    <?php if ($roleName != "TEAM_LEAD" && $roleName != "NATIONAL_RESEARCH" && $roleName != "CORP_MEMBER") { ?>
                        <td><?=$childVO["IDNumber"];?></td>
                    <?php } ?>

                    <td><?=$childVO["regionName"];?></td>
                    <td><?=$childVO["universityName"];?></td>
                    <td><?=$childVO["programName"];?></td>
                    <td><?=$childVO["className"];?></td>
                    <?php if ($roleName != "NATIONAL_RESEARCH") { ?>
                        <td>
                            <div class="dropdown">
                                <a class="dropdown-toggle <?php echo $childVO["id"]; ?>" <?php echo $childVO["id"]; ?> data-toggle="dropdown">
                                   <span class='icon_cogwheel'></span>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dLabel">
                                        <?php echo $updateLink; ?>
                                        <?php echo $deleteLink; ?>
                                </ul>
                            </div>
                        </td>
                    <?php } ?>
                </tr>

            <?php endforeach; ?>
             </tbody>
        </table>

    </div>

    <div class="detail_table_wrapper span3">
            <h4>Attendance detail:</h4>
            <div class="data"></div>
    </div>

</div>
<?php echo $this->element('create_attendance'); ?>
<?php echo $this->element('create_child'); ?>
<?php echo $this->element('update_child'); ?>
<?php echo $this->element('update_attendance'); ?>
<?php echo $this->element('delete_attendance'); ?>
<?php echo $this->element('delete_child'); ?>
<?php echo $this->element('create_program'); ?>
<?php echo $this->element('create_university'); ?>
<?php echo $this->element('create_user'); ?>
<?php echo $this->element('create_user_attendance'); ?>