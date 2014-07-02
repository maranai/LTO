<?php $this->start('mainPage'); ?>
<?php echo $this->element('admin-menu'); ?>

<div class="mainAdminPage">

<table class="adminTable">
<thead>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Password</th>
    <th>Roles</th>
    <th>Opciones</th>
</tr>
</thead>
<tbody>
<?php foreach($usuarios as $usuario){ ?>
<tr>
    <td><?php echo $usuario['Usuario']['id']; ?></td>
    <td><a href="/admin/userDetails"><?php echo $usuario['Usuario']['nombre']; ?></a></td>
    <td><?php echo $usuario['Usuario']['email']; ?></td>
    <td><?php echo $usuario['Usuario']['password']; ?></td>
    <td>
        <?php
        foreach ($usuario['Rol'] as $rol){
            echo $rol['nombre'] . "</br>";
        }
        ?>

    </td>
    <td>
        <a href="/admin/deleteUsuario/<?php echo $usuario['Usuario']['id']; ?>">Eliminar</a>
        &nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="/admin/editUser/<?php echo $usuario['Usuario']['id']; ?>">Editar</a>
    </td>
</tr>

<?php } ?>
</tbody>
</table>

</div>
<!--end of main page    -->
<?php $this->end(); ?>

