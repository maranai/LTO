
<?php
if ($this->Can->user('id') != null) {
    if ($roleName == 'TEAM_LEAD') {
        $role = 'Team Lead';
    }else if ($roleName == 'SITE_MANAGER'){
        $role = 'Site Manager';
    }else if ($roleName == 'PROJECT_DIRECTOR'){
        $role = 'Project Director';
    }else if ($roleName == 'NATIONAL_RESEARCH'){
        $role = 'National Research';
    }else if ($roleName == 'CORP_MEMBER'){
        $role = 'Corp Member';
    }else {
        $role = 'Admin';
    }
}
?>
<?php
$enabledUpdateProfile = ($this->Can->user('first_name') >= 1) ? "editProfile" : "disabled";
$updateLink = "<a data-userId='".$this->Can->user('id')."' data-userFirstName='".$this->Can->user('first_name')."' data-userLastName='".$this->Can->user('last_name')."' data-userEmail='".$this->Can->user('email_address')."' class='editProfileEnabler ".$enabledUpdateProfile."'>". _('Edit Profile')."</a>";
?>

<div class="header_info by-right">

    <?php if ($this->Can->user('id') != null) :?>
    <span class="user_info">
        <?php echo __("Welcome"); ?>:
        <?php echo $this->Can->user('first_name') ?> <?php echo $this->Can->user('last_name') ?>
        ( <?php echo $role ?> <?php echo ")" ?>
    </span>
    <span  id='edit_profile'><?php echo $updateLink; ?></span>
    <span class="login_info">
        <?php echo $this->Html->link(__("Log Out"), '/users/logout'); ?>
    </span>

<?php endif;?>

</div>

<?php echo $this->element('modal_edit_profile'); ?>
