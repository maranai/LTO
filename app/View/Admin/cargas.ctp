<?php $this->start('mainPage'); ?>
<?php echo $this->element('admin-menu'); ?>

<div class="mainAdminPage">

    <h2>Cargas Activas</h2>
    <p>Cargas que no han sido eliminadas y cuya fecha de validez no ha pasado.</p>
    <table class="adminTable">
        <thead>
        <tr>
            <th>ID</th>
            <th>Descripcion</th>
            <th>Provincia Origen</th>
            <th>Canton Origen</th>
            <th>Distrito Origen</th>
            <th>Dirección Origen</th>
            <th>Provincia Destino</th>
            <th>Canton Destino</th>
            <th>Distrito Destino</th>
            <th>Dirección Destino</th>
            <th>Propietario</th>
            <th>Tipo</th>
            <th>Peso</th>
            <th></th>

        </tr>
        </thead>
        <tbody>
        <?php foreach($cargas as $carga){ ?>
        <tr>


            <td><?php echo $carga['Carga']['id']; ?></td>
            <td><a href="/admin/cargaDetails"><?php echo $carga['Carga']['descripcion']; ?></a></td>
            <td><?php echo $carga['ProvinciaOrigen']['nombre']; ?></td>
            <td><?php echo $carga['CantonOrigen']['nombre']; ?></td>
            <td><?php echo $carga['DistritoOrigen']['nombre']; ?></td>
            <td><?php echo $carga['Carga']['dir_origen']; ?></td>
            <td><?php echo $carga['ProvinciaDestino']['nombre']; ?></td>
            <td><?php echo $carga['CantonDestino']['nombre']; ?></td>
            <td><?php echo $carga['DistritoDestino']['nombre']; ?></td>
            <td><?php echo $carga['Carga']['dir_destino']; ?></td>
            <td><?php echo $carga['Usuario']['nombre'] . ' ' . $carga['Usuario']['apellido1']; ?></td>
            <td><?php echo $carga['Tipo']['tipo']; ?></td>
            <td><?php echo $carga['Carga']['peso'] . $carga['Carga']['unidad_peso']; ?></td>

            <td>
                <a href="/admin/deleteCarga/<?php echo $carga['Carga']['id']; ?>">Eliminar</a>
                <a href="/admin/editCarga/<?php echo $carga['Carga']['id']; ?>">Editar</a>
            </td>
        </tr>

            <?php } ?>
        </tbody>
    </table>

</div>
<!--end of main page    -->
<?php $this->end(); ?>

