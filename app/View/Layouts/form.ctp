<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$title = 'fletesCr.com';
$title_for_layout = 'Algo main';
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $title ?>:
        <?php echo $title_for_layout; ?>
    </title>
    <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('styles');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');

    //    JS imports
    echo $this->Html->script('/js/jquery/jquery-2.0.3.min');
    echo $this->Html->script('/js/utils');
    echo $this->Html->script('/js/jquery.pnotify.min');


    echo $this->fetch('customHeadContent');
    ?>
</head>
<body>
<?php
if (isset($messages) && $messages != null){
    echo "<input id='app_messages' type='hidden' value='" . $messages . "'>";
}
?>
<div id='top'>
    <div class="page">
        <div id="topImage"></div>
        <div id='topnav'>
            <a class='topnav visited' target='_top' href='/home'>Inicio</a>
            <a class='topnav' target='_top' href='/transport/index'>Para transportistas</a>
            <a class='topnav' target='_top' href=''>&iquest;Necesita transportar su carga?</a>
            <a class='topnav' target='_top' href='/contact/index'>Cont&aacute;ctenos</a>
        </div>
    </div>
</div>

<div class='formBelowTopNav'>

        <div class='formPage'>
            <div>
                <?php echo $this->fetch('mainPage'); ?>
            </div>
        </div>

</div>

<div id="footer">
    <div class="page">
        <div id="footerContentHeader"></div>
        <hr/>
        <div id="footerContent">

            <table class="bottomlinks">
                <tr>
                    <td>
                        <h3>NOTICIAS RECIENTES DE NUESTRO BLOG</h3>

                        <div class="linkDiv">
                            <a href=""></span>CONSEJOS DE SEGURIDAD</a><br>
                            <span>Antes de contratar un servicio ...</span><br>
                        </div>
                        <div class="linkDiv">
                            <a href=""></span>QUIENES SOMOS</a><br>
                            <span>Antes de contratar un servicio ...</span><br>
                        </div>
                    </td>
                    <td>
                        <h3>¿TE QUEDARON DUDAS?</h3>

                        <div class="linkDiv">
                            <a href="">CONTACTANOS</a><br>
                        </div>
                        <div class="linkDiv">
                            <a href="">TERMINOS Y CONDICIONES</a><br>
                        </div>
                        <div class="linkDiv">
                            <a href="">POLITICA DE PRIVACIDAD</a><br>
                        </div>
                        <div class="linkDiv">
                            <a href="">POLITICA DE REEMBOLSO</a><br>
                        </div>
                    </td>
                    <td>

                        <h3>SIGUENOS</h3>

                        <div class="linkDiv">
                            <span><img src="../img/icons/facebook.png"></span>
                            <span><img src="../img/icons/twitter.png"></span>
                        </div>

                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>