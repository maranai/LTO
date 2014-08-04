<?php
$this->start('mainPage');
echo $this->Html->script('/js/cantonesydistritos');
echo $this->Html->script('/js/addCarga');
echo $this->element('admin-menu');
?>

<div class="mainAdminPage" xmlns="http://www.w3.org/1999/html">
    <h2>Crear Carga</h2>

    <div>
        <table>

            <?php echo $this->Form->create("Carga", array('url' => '/admin/addCarga', 'label' => false)); ?>

            <tr>
                <td>
                    Tipo <span class="requiredField">(*)</span>
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
                <td>Descripci&oacute;n<span class="requiredField">(*)</span></td>
                <td>
                    <?php echo $this->Form->input('Carga.descripcion', array('type' => 'textarea', 'label' => false, 'rows' => 5, 'cols' => 80));?>
                </td>
            </tr>


            <tr>
                <td>Peso<span class="requiredField">(*)</span></td>
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
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                <td>
                    <?php echo $this->Form->radio('Carga.propiedad', array(
                    'dimensiones' => 'Agregar Dimensiones'
                    ), array(
                    'legend' => false,
                    'value' => 'dimensiones'
                    )); ?>
                </td>
                <td>
                    <?php
                    $list = array(
                        "cm" => "Centímetros",
                        "m" => "Metros",
                        "pies" => "Pies",
                        "plg"   => "Pulgadas");

                    ?>
                    <span>Alto</span>
                    <?php echo $this->Form->input('Carga.alto', array('label' => false));?><br/>
                    <span>Ancho</span>
                    <?php echo $this->Form->input('Carga.ancho', array('label' => false));?><br/>
                    <span>Largo</span>
                    <?php echo $this->Form->input('Carga.largo', array('label' => false));?><br/>
                    <span>Unidad de medida de las dimensiones</span>

                    <?php
                    echo $this->Form->select('Carga.unidad_dimensiones', $list, array(
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



            <tr><td colspan="2">&nbsp;</td></tr>
            <tr>
                <td>
                    <?php echo $this->Form->radio('propiedad', array(
                        'volumen' => 'Agregar Volumen'
                    ), array(
                        'legend' => false
                    )); ?>
                </td>
                <td>
                    <?php
                    $list = array(
                        "m" => "Metros cúbicos",
                        "pies" => "Pies cúbicos");

                    echo $this->Form->input('Carga.volumen', array('label' => false));

                    ?>
                    <br/>
                    <span>
                    Unidad de medida del volumen
                    </span>
                    <?php
                    echo $this->Form->select('Carga.unidad_volumen', $list, array(
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

            <tr><td colspan="2">&nbsp;</td></tr>

            <tr>
                <td>
                    Usuario que publica la carga<span class="requiredField">(*)</span>
                </td>
                <td>
                    <?php
                    echo $this->Form->input('propietario', array(
                        'type' => 'textbox',
                        'label' => false,
                        'autocomplete' => 'on'
                    )); ?>

                    <?php echo $this->Form->input('Carga.propietario_id', array(
                        'type' => 'hidden',
                        'label' => false
                    )); ?>

                </td>

            </tr>
            <tr>
                <td colspan="2"><h3>Lugar de Salida de la Carga</h3></td>
            </tr>

            <tr>
                <td>Provincia<span class="requiredField">(*)</span></td>
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
                <td>Cant&oacute;n<span class="requiredField">(*)</span></td>
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
                <td>Distrito<span class="requiredField">(*)</span></td>
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
                <td>Provincia<span class="requiredField">(*)</span></td>
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
                <td>Cant&oacute;n<span class="requiredField">(*)</span></td>
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
                <td>Distrito<span class="requiredField">(*)</span></td>
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
                <td colspan="2"><h3>Fecha de Salida de la Carga</h3></td>
            </tr>

            <tr>
                <td>
                    <p>Fecha en que debe ser transportada:<span class="requiredField">(*)</span></p>
                </td>
                <td>
                    <?php

                    $list = array(
                        "0" => "Lo más pronto posible",
                        "1" => "Especificar fecha",
                        "2" => "Esta semana",
                        "3" => "Próxima semana",
                        "4" => "Este mes",
                        "5" => "Especificar fechas en las que se podría transportar la carga");

                    echo $this->Form->select('Carga.fecha_para_carga', $list, array(
                            'multiple' => false,
                            'type' => 'select',
                            'class' => false,
                            'tag' => false,
                            'label' => false
                        )
                    );

                    ?>

                    <br/>

                    <div id="especificar_fecha" class="hide">
                        <span>Fecha:</span><br/>
                        <?php
                        echo $this->Form->input('Carga.fecha', array(
                        'type' => 'textbox',
                        'class' => 'datepicker',
                        'label' => false
                        ));
                        ?>
                    </div>


                    <div id="especificar_rango" class="hide">
                        <span>Desde</span>
                        <?php
                        echo $this->Form->input('Carga.fecha_inicio_rango', array(
                            'type' => 'textbox',
                            'class' => 'datepicker',
                            'label' => false
                        ));
                        ?>
                        <span>Hasta</span>
                        <?php
                        echo $this->Form->input('Carga.fecha_fin_rango', array(
                            'type' => 'textbox',
                            'class' => 'datepicker',
                            'label' => false
                        ));
                        ?>
                    </div>

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