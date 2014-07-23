<?php
$this->start('mainPage');
//echo $this->Html->script('/js/prototype/prototype');
echo $this->Html->script('/js/cantonesydistritos');
echo $this->element('admin-menu');
?>

<div class="mainAdminPage">
    <h2>Crear Carga</h2>

    <div>
        <table>

            <?php echo $this->Form->create("Carga", array('url' => '/admin/addCarga', 'label' => false)); ?>



            <tr>
                <td>Descripci&oacute;n</td>
                <td>
                    <?php echo $this->Form->input('Carga.descripcion', array('type' => 'textarea', 'label' => false, 'rows' => 5, 'cols' => 80));?>
                </td>
            </tr>


            <tr>
                <td>Peso</td>
                <td>
                    <?php echo $this->Form->input('Carga.peso', array('type' => 'input', 'label' => false));?>

                    <?php
                    $list = array("2" => "Toneladas", "1" => "Kilos");

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
                <td>Provincia</td>
                <td>
                    <?php echo $this->Form->input('Provincia.id', array(
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
                    echo $this->Form->input('Canton.id', array(
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
                    echo $this->Form->input('Distrito.id', array(
                        'type' => 'select',
                        'label' => false,
                        'empty' => '-- Escoja un distrito --'
                    )); ?>
                </td>
            </tr>

            <tr>

                <td colspan="2">

                    <?php echo $this->Form->end('Crear Carga');?>
                </td>

        </table>
    </div>

</div>
<?php $this->end(); ?>