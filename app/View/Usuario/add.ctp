<?php
$this->start('customHeadContent');
echo $this->Html->script('/js/bjqs-1.3.min');
echo $this->Html->script('/js/mainPage');
echo $this->Html->css('/css/bjqs');
$this->end();

$this->start('mainPage'); ?>

<div class="usuario form">
    <?php echo $this->Form->create('Usuario'); ?>
    <fieldset>
        <legend><?php echo __('Add User'); ?></legend>
        <?php
        echo $this->Form->input('email');
        echo $this->Form->input('password');
        echo $this->Form->input('nombre');
        echo $this->Form->input('apellido1');
        echo $this->Form->input('telefono');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit')); ?>
</div>

    <?php $this->end(); ?>