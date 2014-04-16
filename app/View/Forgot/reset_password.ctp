<?php
/**
 * Created by JetBrains PhpStorm.
 * User: aarroyo
 * Date: 4/11/14
 * Time: 6:34 PM
 * To change this template use File | Settings | File Templates.
 */
?>
<?php
$this->start('mainPage');
//echo $this->validationErrors;
?>

<div class="mainForm">
    <h1>
        Cambio de Contraseña
    </h1>


    <div class="box">
        <div class="box-shadow"></div>
        <div class="box-gradient">
            <div class="box-gradient-content shortNotification">

                <p>Usted puede crear una nueva contraseña para su cuenta y puede utilizarla <br/>
                    la pr&oacute;xima vez que ingrese a fletescr.com</p>

                <?php echo $this->Form->create('PasswordReset', array('novalidate')); ?>
                <table>
                    <tr>
                        <td class="fieldTitle">
                            Nueva contraseña (*)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->Form->input('rstPassword', array('type' => 'password', 'label' => false, 'size' => '40')); ?>
                        </td>
                    </tr>
                    <tr><td></td></tr>
                    <tr>
                        <td class="fieldTitle">
                            Confirmar contraseña (*)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php echo $this->Form->input('rstPassword2', array('type' => 'password', 'label' => false, 'size' => '40')); ?>
                        </td>
                    </tr>

                    <?php echo $this->Form->input('edit_usr_id', array('type' => 'hidden', 'value' => $edit_usr_id)) ?>

                    <tr>
                        <td class="fieldTitle">Los campos marcados con (*) son obligatorios</td>
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
    </div>
    <br/>

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

