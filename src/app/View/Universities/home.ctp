<!-- Universities/home.ctp -->

<div class='offset1 span10 tabs_body row-fluid'>


    <?php echo $this->element('menu', array('active_item'=>'view_universities')); ?>
    <div class="scroll_div table_wrapper">

    <?php if ($roleName == "ADMIN") { ?>
        <div class="btn-group pull-right">
          <button id='create_university' class='create_university btn'><i class="icon-book"></i> Add University</button>
        </div>
     <?php } ?>

    <table id='university_list' class="table table-condensed table-striped">
        <thead>
            <th>Name</th>
            <th>Region</th>
            <th></th>
        </thead>
        <tbody>
        <?php foreach ($universitiesVO as $universityVO): ?>
            <?php
            $enabledUpdateUniversity = ($universityVO["id"] >= 1) ? "updateUniversity" : "disabled";
            $updateUniversityLink = "<li id='update_university'><a data-universityId='".$universityVO["id"]."' data-universityName='".$universityVO["name"]."' data-regionId='".$universityVO["regionId"]."' class='".$enabledUpdateUniversity."' href='#'>". _('Update')."</a></li>";
            ?>
            <tr>
                <td><?=$universityVO["name"];?></td>
                <td><?=$universityVO["regionName"];?></td>
                <td>
                    <div class="dropdown">

                        <a class="dropdown-toggle <?php echo $universityVO["id"]; ?>" <?php echo $universityVO["id"]; ?> data-toggle="dropdown">
                            <span class='icon_cogwheel'></span>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                            <?php echo $updateUniversityLink; ?>
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
<?php echo $this->element('update_university'); ?>
<?php echo $this->element('create_user'); ?>
