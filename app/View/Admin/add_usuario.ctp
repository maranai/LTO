<?php $this->start('mainPage'); ?>

<?php echo $this->element('admin-menu'); ?>

<div class="mainAdminPage">
<h2>Crear Usuario</h2>

<div>

    <?php

    echo $this->Form->create("Usuario", array('url' => '/admin/addUsuario'));
    echo $this->Form->input('Usuario.password', array('type'=>'input', 'label' => false));
    echo "<br/>";
    echo $this->Form->input('Usuario.nombre', array('type'=>'input', 'label' => false));
    echo "<br/>";
    echo $this->Form->input('Usuario.apellido1', array('type'=>'input', 'label' => false));
    echo "<br/>";
    echo $this->Form->input('Usuario.email', array('type'=>'input', 'label' => false));
    echo "<br/>";
    echo $this->Form->input('Usuario.email2', array('type'=>'input', 'label' => false));
    echo "<br/>";
    echo $this->Form->input('Usuario.telefono', array('type'=>'input', 'label' => false));
    echo "<br/>";
    echo $this->Form->input('Usuario.telefono2', array('type'=>'input', 'label' => false));
    echo "<br/>";

    $list = array("2" => "Transportista", "1"=> "Administrador");
    echo $this->Form->select('Rol', $list, array(
            'multiple' => 'multiple',
            'type' => 'select',
        )
    );
    echo "<br/>";
    echo $this->Form->end('Crear Usuario');

    ?>

</div>

</div>
<?php $this->end(); ?>