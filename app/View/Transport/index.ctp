<?php
/**
 * User: aarroyo
 * Date: 1/30/14
 */

$this->start('customHeadContent');
echo $this->Html->script('/js/mainPage');
echo $this->Html->script('/js/jquery.simplemodal');
echo $this->Html->script('/js/mainPage');

$this->end();

$this->start('mainPage');?>

<div id='olvido-clave-modal' class="modalWindow">
    <h3>Solicitud de Clave</h3>
    <p>Para solicitar una nueva clave, ingrese su correo electr&oacute;nico y presione enviar.</p>
    <p>Durante los pr&oacute;ximos minutos, le enviaremos instrucciones para que pueda cambiar su clave.</p>
    <form name="formOlvido" autocomplete="off" method="post" action="/usuarios/olvidoClave">
        <div class="spacedTopBottom35">
            <label>Email:</label>
            <input placeholder="Ingrese su email" type="text" id="email" name="email" value="" size="50"><br />
            <span id="emailUserError" class="emailUserError hide error">El email que ingres&oacute; no se encuentra registrado.</span>
            <span id="emailFormatError" class="emailUserError hide error">Debe ingresar un email con un formato v&aacute;lido.</span>

        </div>
        <div class="spacedTopBottom35">
            <input id="btnOlvidoSubmit" type="submit" value="Enviar" class="orangeButton">
            <input class="btnCancelar orangeButton" type="submit" value="Cancelar">
        </div>
    </form>
</div>

<div id='olvido-clave-confirm' class="modalWindow">
    <h3>Solicitud de Clave</h3>
    <p>Hemos enviado instrucciones para cambiar su clave a su cuenta de correo.</p>
    <p>Por favor localice en su correo un mensaje de soporte@fletescr.com y haga click en el link inclu&iacute;do para cambiar su clave.</p><br/>
    <p>Nota: Si usted utiliza algún filtro de correos o alguna aplicaci&oacute;n anti-spam, debe asegurarse de que nuestro mensaje no sea bloqueado. Si usted no recibe el mensaje, por favor contáctenos a <a href="mailto:soporte@fletescr.com">soporte@fletescr.com</a> </p>

    <div class="spacedTopBottom35">
        <input class="btnCancelar orangeButton" type="submit" value="Regresar">
    </div>
</div>

<input type="hidden" id="emailSentConfirm" value="<?php if(isset($emailSent)){ echo "1"; } else {echo "0"; } ?>">
<input type="hidden" id="olvidoUserError" value="<?php if(isset($usrNotFound)){ echo "1"; } else {echo "0"; } ?>">
<input type="hidden" id="emailIncorrecto" value="<?php if(isset($emailError)){ echo "1"; } else {echo "0"; } ?>">

<div class="twoColumns">
    <div class="leftColumn">
        <h2 class="subSection">¿Usuario Nuevo?</h2>
        <h4 class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</h4>

        <p class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>

        <p class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>

        <p class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</p>
    </div>

    <div class="rightColumn">
        <div id="rightSection">
            <div id="rightSectionHeader">
                Ingrese utilizando su usuario y clave
            </div>
            <div id="rightSectionContent">

                                <form name="formLogin" autocomplete="off" method="post" action="/usuarios/login">

                                    <table>
                                        <tr>
                                            <td colspan="2"><label>Correo electr&oacute;nico</label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="text" name="lgnEmail" id="lgnEmail" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><label>Clave</label></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><input type="password" name="lgnPassword" id="lgnPassword" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td><a id="olvidoClave">Olvid&eacute; mi clave</a></td>
                                            <td><input name="btnSubmit" type="submit" id="btnSubmit" value="Ingresar" class="orangeButtonWithBackground"></td>
                                        </tr>

                                    </table>

                                </form>

                <?php
// Pass the model name into the Create function, also pass where the data will be sent
//                echo $this->form->create('Usuario', array('controller' => 'usuario', 'action' => 'login'));

// Cake automatically knows, based on the input, to create input fields for these two. Cool eh?
//                echo $this->form->input('email');

                ?>



<!--                <div style="clear: inherit;"></div>-->
<!---->
<!--                --><?php
//                echo $this->form->input('password');
//
//                ?>
<!---->
<!---->
<!--                <div style="clear: inherit;"></div>-->
<!--                --><?php
//// Create the submit button
//                echo $this->form->end('Ingresar');
                ?>


            </div>

        </div>
    </div>
</div>
<?php $this->end();


?>

