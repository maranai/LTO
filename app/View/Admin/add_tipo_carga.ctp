<?php
$this->start('mainPage');
echo $this->element('admin-menu');
?>

<div class="mainAdminPage">
    <h2>Crear Tipo de Carga</h2>

    <div>
        <table>

            <?php echo $this->Form->create("Tipo", array('url' => '/admin/addTipoCarga', 'label' => false)); ?>

            <tr>
                <td>
                    Nombre
                </td>
                <td>
                    <?php echo $this->Form->input('Tipo.tipo', array('label' => false));?>
                </td>

            </tr>

            <tr>
                <td>Mostrar a los usuarios</td>
                <td>
                    <?php
                    $list = array("1" => "Si", "0" => "No");

                    echo $this->Form->select('Tipo.mostrar', $list, array(
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
                <td colspan="2">
                    <?php echo $this->Form->end('Crear Tipo de Carga');?>
                </td>
            </tr>

        </table>
    </div>

</div>
<?php $this->end(); ?>