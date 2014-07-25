<?php $this->start('mainPage'); ?>
<?php echo $this->element('admin-menu'); ?>

<div class="mainAdminPage">

    <h2>Fletes Eliminados</h2>
    <p>Fletes que fueron borrados.</p>
    <table class="adminTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Descripcion</th>
            <th>Provincia Origen</th>
            <th>Canton Origen</th>
            <th>Distrito Origen</th>
            <th>Provincia Destino</th>
            <th>Canton Destino</th>
            <th>Distrito Destino</th>
            <th>Propietario</th>
            <th>Capacidad</th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        <?php foreach($fletes as $flete){ ?>
        <tr>


            <td><?php echo $flete['Flete']['id']; ?></td>
            <td><a href="/admin/fleteDetails"><?php echo $flete['Flete']['descripcion']; ?></a></td>
            <td><?php echo $flete['ProvinciaOrigen']['nombre']; ?></td>
            <td><?php echo $flete['CantonOrigen']['nombre']; ?></td>
            <td><?php echo $flete['DistritoOrigen']['nombre']; ?></td>
            <td><?php echo $flete['CantonDestino']['nombre']; ?></td>
            <td><?php echo $flete['DistritoDestino']['nombre']; ?></td>
            <td><?php echo $flete['ProvinciaDestino']['nombre']; ?></td>
            <td><?php echo $flete['Usuario']['nombre'] . ' ' . $flete['Usuario']['apellido1']; ?></td>
            <td><?php echo $flete['Flete']['capacidad'] . $flete['Flete']['unidad_peso']; ?></td>

            <td>
                <a href="/admin/restoreFlete/<?php echo $flete['Flete']['id']; ?>">Restaurar</a>
                <a href="/admin/editFlete/<?php echo $flete['Flete']['id']; ?>">Editar</a>
            </td>
        </tr>

            <?php } ?>
        </tbody>
    </table>

</div>
<!--end of main page    -->
<?php $this->end(); ?>

