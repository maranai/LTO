<?php
$this->start('mainPage');
echo $this->Html->script('/js/cantonesydistritos');
echo $this->Html->script('/js/addCarga');
echo $this->element('admin-menu');
?>

<div class="mainAdminPage">
    <h2>Crear Carga</h2>

    <div>
        <table>

            <?php echo $this->Form->create("Carga", array('url' => '/admin/addCarga', 'label' => false)); ?>

            <tr>
                <td>
                    Tipo
                </td>
                <td>
                    <?php echo $this->Form->input('Carga.tipo_id', array(
                    'type' => 'select',
                    'options' => $tiposCarga,
                    'empty' => '-- Escoja un tipo de carga --',
                    'label' => false
                ));?>
                <div class="hide" id="newTipoCarga">
                    <span>Especifique el tipo de carga: </span>
                    <?php echo $this->Form->input('Tipo.tipo', array('label' => false));?>
                </div>

                </td>

            </tr>

            <tr>
                <td>Descripci&oacute;n</td>
                <td>
                    <?php echo $this->Form->input('Carga.descripcion', array('type' => 'textarea', 'label' => false, 'rows' => 5, 'cols' => 80));?>
                </td>
            </tr>


            <tr>
                <td>Peso</td>
                <td>
                    <?php echo $this->Form->input('Carga.peso', array('label' => false));?>

                    <?php
                    $list = array("TON" => "Toneladas", "KG" => "Kilos");

                    echo $this->Form->select('Carga.unidad_peso', $list, array(
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
                <td colspan="2"><h3>Lugar de Salida de la Carga</h3></td>
            </tr>

            <tr>
                <td>Provincia</td>
                <td>
                    <?php echo $this->Form->input('Carga.provincia_origen_id', array(
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
                    echo $this->Form->input('Carga.canton_origen_id', array(
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
                    echo $this->Form->input('Carga.distrito_origen_id', array(
                        'type' => 'select',
                        'label' => false,
                        'empty' => '-- Escoja un distrito --'
                    )); ?>
                </td>
            </tr>

            <tr>
                <td>Dirección exacta:</td>
                <td>
                    <?php
                    echo $this->Form->input('Carga.dir_origen', array(
                        'label' => false,
                        'type' => 'textarea',
                        'rows' => 3, 'cols' => 100
                    )); ?>
                </td>
            </tr>

            <tr>
                <td colspan="2"><h3>Lugar de Destino de la Carga</h3></td>
            </tr>

            <tr>
                <td>Provincia</td>
                <td>
                    <?php echo $this->Form->input('Carga.provincia_destino_id', array(
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
                    echo $this->Form->input('Carga.canton_destino_id', array(
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
                    echo $this->Form->input('Carga.distrito_destino_id', array(
                        'type' => 'select',
                        'label' => false,
                        'empty' => '-- Escoja un distrito --'
                    )); ?>
                </td>
            </tr>
            <tr>
                <td>Dirección exacta:</td>
                <td>
                    <?php
                    echo $this->Form->input('Carga.dir_destino', array(
                        'label' => false,
                        'type' => 'textarea',
                        'rows' => 3, 'cols' => 100
                    )); ?>
                </td>
            </tr>

            <tr>
                <td>
                    Usuario que publica la carga
                </td>
                <td>
                    <?php
                    echo $this->Form->input('propietario', array(
                    'type' => 'textbox',
                    'label' => false,
                    'autocomplete' => 'on'
                    ));

                    echo $this->Form->input('Carga.propietario_id', array(
                    'type' => 'hidden',
                    'label' => false
                    )); ?>

                </td>

            </tr>
            <tr>
                <td colspan="2">
                    <?php echo $this->Form->end('Crear Carga');?>
                </td>
            </tr>

        </table>
    </div>

</div>
<?php $this->end(); ?>