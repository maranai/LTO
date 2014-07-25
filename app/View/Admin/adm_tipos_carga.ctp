<?php $this->start('mainPage'); ?>
<?php echo $this->element('admin-menu'); ?>

<div class="mainAdminPage">

    <h2>Tipos de Carga</h2>
    <p>Si desea crear un tipo de carga haga click <a href="/admin/addTipoCarga">aquí</a></p>
    <table class="adminTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Mostrar a los usuarios</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($tiposCarga as $tipo){ ?>
        <tr>
            <td><?php echo $tipo['Tipo']['id']; ?></td>
            <td><?php echo $tipo['Tipo']['tipo']; ?></td>
            <td><?php echo $tipo['Tipo']['mostrar']; ?></td>
            <td>
                <a href="/admin/eliminarTipo/<?php echo $tipo['Tipo']['id']; ?>">Eliminar</a>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                <a href="/admin/guardarTipo/<?php echo $tipo['Tipo']['id']; ?>">Guardar</a>
            </td>
        </tr>

            <?php } ?>
        </tbody>
    </table>

</div>
<!--end of main page    -->
<?php $this->end(); ?>

