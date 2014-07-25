<?php
$this->start('mainPage');
echo $this->Html->script('/js/cantonesydistritos');
echo $this->Html->script('/js/addFlete');
echo $this->element('admin-menu');
?>

<div class="mainAdminPage">
    <h2>Crear Flete</h2>

    <div>
        <table>

            <?php echo $this->Form->create("Flete", array('url' => '/admin/addFlete', 'label' => false)); ?>

            <tr>
                <td>Descripci&oacute;n</td>
                <td>
                    <?php echo $this->Form->input('Flete.descripcion', array('type' => 'textarea', 'label' => false, 'rows' => 5, 'cols' => 80));?>
                </td>
            </tr>


            <tr>
                <td>Capacidad</td>
                <td>
                    <?php echo $this->Form->input('Flete.capacidad', array('label' => false));?>

                    <?php
                    $list = array("TON" => "Toneladas", "KG" => "Kilos");

                    echo $this->Form->select('Flete.unidad_peso', $list, array(
                            'multiple' => false,
                            'type' => 'select',
                            'class' => false,
                            'tag' => false,
                            'label' => false
                        )
                    );
                    ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><h3>Lugar de Salida del Flete</h3></td>
            </tr>

            <tr>
                <td>Provincia</td>
                <td>
                    <?php echo $this->Form->input('Flete.provincia_origen_id', array(
                    'type' => 'select',
                    'options' => $provincias,
                    'empty' => '-- Escoja una provincia --',
                    'label' => false
                ));?>
                </td>
            </tr>

            <tr>
                <td>Cant&oacute;n</td>
                <td>
                    <?php
                    echo $this->Form->input('Flete.canton_origen_id', array(
                        'type' => 'select',
                        'label' => false,
                        'empty' => '-- Escoja un cantón --'
                    ));?>
                </td>
            </tr>

            <tr>
                <td>Distrito</td>
                <td>
                    <?php
                    echo $this->Form->input('Flete.distrito_origen_id', array(
                        'type' => 'select',
                        'label' => false,
                        'empty' => '-- Escoja un distrito --'
                    )); ?>
                </td>
            </tr>

            <tr>
                <td colspan="2"><h3>Lugar de Destino del Flete</h3></td>
            </tr>

            <tr>
                <td>Provincia</td>
                <td>
                    <?php echo $this->Form->input('Flete.provincia_destino_id', array(
                    'type' => 'select',
                    'options' => $provincias,
                    'empty' => '-- Escoja una provincia --',
                    'label' => false
                ));?>
                </td>
            </tr>

            <tr>
                <td>Cant&oacute;n</td>
                <td>
                    <?php
                    echo $this->Form->input('Flete.canton_destino_id', array(
                        'type' => 'select',
                        'label' => false,
                        'empty' => '-- Escoja un cantón --'
                    ));?>
                </td>
            </tr>

            <tr>
                <td>Distrito</td>
                <td>
                    <?php
                    echo $this->Form->input('Flete.distrito_destino_id', array(
                        'type' => 'select',
                        'label' => false,
                        'empty' => '-- Escoja un distrito --'
                    )); ?>
                </td>
            </tr>

            <tr>
                <td>
                    Usuario que publica el flete
                </td>
                <td>
                    <?php
                    echo $this->Form->input('propietario', array(
                        'type' => 'textbox',
                        'label' => false,
                        'autocomplete' => 'on'
                    ));

                    echo $this->Form->input('Flete.propietario_id', array(
                        'type' => 'hidden',
                        'label' => false
                    )); ?>

                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->end('Crear Flete');?>
                </td>
            </tr>

        </table>
    </div>

</div>
<?php $this->end(); ?>