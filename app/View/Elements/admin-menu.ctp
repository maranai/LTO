<?php
echo $this->Html->script('/js/superfish/superfish');
echo $this->Html->css('superfish');
echo $this->Html->css('admin-styles');
?>
<ul class="sf-menu" id="example">
    <li class="current">
        <a href="/admin/usuarios">Usuarios</a>
        <ul>
            <li>
                <a href="/admin/addUsuario">Crear</a>
            </li>
<!--            <li class="current">-->
<!--                <a href="followed.html">long menu item sets sub width</a>-->
<!--                <ul>-->
<!--                    <li class="current"><a href="followed.html">menu item</a></li>-->
<!--                    <li><a href="followed.html">menu item</a></li>-->
<!--                    <li><a href="followed.html">menu item</a></li>-->
<!--                    <li><a href="followed.html">menu item</a></li>-->
<!--                    <li><a href="followed.html">menu item</a></li>-->
<!--                </ul>-->
<!--            </li>-->
        </ul>
    </li>
    <li>
        <a href="/admin/cargas">Cargas</a>
        <ul>
            <li>
                <a href="/admin/addCarga">Crear</a>
            </li>
            <li>
                <a href="/admin/cargasEliminadas">Cargas eliminadas</a>
            </li>
            <li>
                <a href="/admin/admTiposCarga">Administrar tipos de carga</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="/admin/fletes">Fletes</a>
        <ul>
            <li>
                <a href="/admin/addFlete">Crear</a>
            </li>
            <li>
                <a href="/admin/fletesEliminados">Fletes eliminados</a>
            </li>
        </ul>
    </li>

</ul>