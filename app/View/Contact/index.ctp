<?php
$this->start('mainPage');
//echo $this->validationErrors;
?>

<div class="mainForm">
    <h1>
        Nos interesa su opini&oacute;n
    </h1>

    <h3>
        Por favor, d&eacute;jenos sus preguntas, comentarios o sugerencias y le responderemos lo m&aacute;s pronto
        posible.
    </h3>

    <div class="box">
        <div class="box-shadow"></div>
        <div class="box-gradient">

            <?php echo $this->Form->create('ContactForm', array('novalidate')); ?>
            <table>
                <tr>
                    <td>
                        Nombre (*)
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('ctNombre', array('label' => false, 'size' => '60')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Correo electr&oacute;nico (*)
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('ctEmail', array('placeholder' => 'Formato correcto: ejemplo@fletescr.com', 'label' => false, 'size' => '60')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Tel&eacute;fono
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->input('ctTelefono', array('label' => false, 'size' => '60')); ?>
                    </td>
                </tr>
                <tr>
                    <td>
                        Su comentario (*)
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $this->Form->textarea('ctComentario', array('placeholder' => 'Ingrese su comentario o sugerencia...', 'label' => false, 'cols' => "100",  'rows' => "5")); ?>
                    </td>
                </tr>
                <tr>
                    <td>Los campos marcados con (*) son obligatorios</td>
                </tr>
                <tr class="paddingTop5">
                    <td>
                        <?php
                        $options = array('label' => 'Enviar', 'class' => 'orangeButton', 'div' => false);
                        echo $this->Form->end($options);
                    ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br />

    <h2>
        Log&iacute;stica de transporte Online
    </h2>
    <h4>
        <a href="mailto:info@fletescr.com">info@fletescr.com</a>
    </h4>

</div>
<?php
$this->end();
?>

