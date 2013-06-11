<!-- users/user_list.ctp -->

<div class='offset1 span10 tabs_body row-fluid'>

<?php echo $this->element('menu', array('active_item'=>'view_users')); ?>

    <div class="scroll_div table_wrapper">
    <?php if ($roleName == "ADMIN") { ?>
    <div class="btn-group pull-right">
      <button id='create_user' class='btn create_user'> <i class="icon-user"></i> Add User</button>
    </div>
 <?php } ?>
    <table id='user_list' class="table table-condensed table-striped">
        <thead>
            <th>Name</th>
            <th>Last Name</th>
            <th>Role</th>
            <th>Username</th>
            <th>Email</th>
            <th></th>
        </thead>
        <tbody>
        <?php foreach ($usersVO as $userVO): ?>
            <?php
            $enabledUpdateUser = ($userVO["id"] >= 1) ? "updateUser" : "disabled";
            $updateUserLink = "<li id='update_user'><a data-userId='".$userVO["id"]."' data-userFirstName='".$userVO["firstName"]."' data-userLastName='".$userVO["lastName"]."' data-username='".$userVO["username"]."' data-userPassword='".$userVO["password"]."' data-userEmail='".$userVO["email"]."' data-userClassroomId='".$userVO["classroomId"]."' data-userUniversityId='".$userVO["universityId"]."' data-userRegionId='".$userVO["regionId"]."' class='".$enabledUpdateUser."' href='#'>". _('Update')."</a></li>";
            $enabledDeleteUser = ($userVO["id"] >= 1) ? "deleteUser" : "disabled";
            $deleteUserLink = "<li id='delete_user'><a data-userId='".$userVO["id"]."' class='".$enabledDeleteUser."' href='#'>". _('Delete')."</a></li>";
            ?>

            <tr>
                <td><?=$userVO["firstName"];?></td>
                <td><?=$userVO["lastName"];?></td>
                <td><?=$userVO["roleName"];?></td>
                <td><?=$userVO["username"];?></td>
                <td><?=$userVO["email"];?></td>
                <td>
                    <div class="dropdown">
                         <a class="dropdown-toggle <?php echo $userVO["id"]; ?>" <?php echo $userVO["id"]; ?> data-toggle="dropdown">
                            <span class='icon_cogwheel'></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <?php echo $updateUserLink; ?>
                            <?php echo $deleteUserLink; ?>
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
<?php echo $this->element('update_user'); ?>
<?php echo $this->element('create_user'); ?>
<?php echo $this->element('delete_user'); ?>
