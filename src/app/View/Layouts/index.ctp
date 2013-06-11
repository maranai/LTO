<!DOCTYPE html>
<html lang="en">
<head>
    <?php $version='1.0'; ?>
    <!-- index.ctp -->
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

    <title><?php echo $title_for_layout?></title>

    <?php echo $scripts_for_layout ?>

    <?php
        $stylesheets = array( "jquery/jquery-ui-1.8.17.custom", "bootstrap");
        echo $this->Html->css($stylesheets, null);
    ?>


</head>
<?php if(empty($is_logged)||!$is_logged): ?>
<body class='login'>
<?php else: ?>
<body>
<?php endif; ?>
<div class="container row-fluid">

        <div class="row-fluid header">
            <?php echo $this->element('header'); ?>
        </div>
        <div class="row-fluid content">
                <?php echo $this->fetch('content'); ?>
        </div>

        <div class="row-fluid footer">
                <?php echo $this->element('footer'); ?>
        </div>
</div>


<script data-main="<?php echo $this->Html->url("/js/index", true);?>" src="<?php echo $this->Html->url("/js/libs/require-jquery.js", true);?>"></script>

</body>
</html>
