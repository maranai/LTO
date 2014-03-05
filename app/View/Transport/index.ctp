<?php
/**
 * User: aarroyo
 * Date: 1/30/14
 */

$this->start('customHeadContent');
echo $this->Html->script('/js/bjqs-1.3.min');
echo $this->Html->script('/js/mainPage');
//echo $this->Html->css('/css/bjqs');
echo $this->Html->script('/js/jquery.simplemodal');
echo $this->Html->script('/js/mainPage');

$this->end();

$this->start('mainPage');?>

<div id='olvido-clave-modal' class="modalWindow">
    <h3>Solicitud de Clave</h3>
    <p>Para solicitar una nueva clave, ingrese su correo electr&oacute;nico y presione enviar.</p>
    <p>Durante los pr&oacute;ximos minutos, le enviaremos instrucciones para que pueda cambiar su clave.</p>
    <div class="spacedTopBottom35">
    <label>Email:</label>
    <input type="text" id="email" name="email" value="" size="50">
    </div>
    <div class="spacedTopBottom35">
        <input type="submit" value="Enviar" class="orangeButton">
        <input type="submit" value="Cancelar" class="orangeButton">

    </div>

</div>

<div class="twoColumns">
    <div class="leftColumn">
        <h2 class="subSection">¿Usuario Nuevo?</h2>
        <h4 class="subSection">aspdfaspdfjpaosid fjpaosi fasijfipsaj fisuahfo ihas douhfo iasdhfoiasu dfioas foi
            sihfoias dfoiau dfis
            asdfjpaosid fjpaosi fasijfipsaj fisuahfo ihas douhfo iasdhfoiasu dfioas foi sihfoias dfoiau dfis asdf</h4>

        <p class="subSection">fasdf asdfads sadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhoias
            dhof adhosif sadi
            fios aifiosa dfsadfa dsfoasd.
            ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dffsadfa
            dsfoasd ifhoias dhof adhosif sadi fios aifiosa df</p>

        <p class="subSection">fasdf asdfads sadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhoias
            dhof adhosif sadi
            fios aifiosa dfsadfa dsfoafios aifiosa dfsadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dffsadfa
            dsfoasd ifhoias dhof adhosif sadi fios aifiosa df</p>

        <p class="subSection">fasdf asdfads sadfa dsfoasd ifhoias dhof adhosif saa dfsadfa dsfoasd.
            ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhaifiosa df</p>
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

