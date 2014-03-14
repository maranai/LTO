<?php
/**
 * User: aarroyo
 * Date: 1/30/14
 */

$this->start('customHeadContent');
echo $this->Html->script('/js/bjqs-1.3.min');
echo $this->Html->script('/js/mainPage');
echo $this->Html->css('/css/bjqs');
$this->end();

$this->start('pageDividerContent'); ?>
<div class="pageDivider">
    <div class="page">
        <h2>¿Cómo funciona fletescr.com?</h2>
        <table class="pageDividerTable">
            <tr>
                <td>
                    <img src="../img/mainPage1.png"><br/>
                    <span class="sectionTitle">Transportes</span><br/>
                    <span class="sectionText">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</span>
                </td>
                <td>
                    <img src="../img/mainPage1.png"><br/>
                    <span class="sectionTitle">Servicio Carga</span><br/>
                    <span class="sectionText">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</span>
                </td>

                <td>
                    <img src="../img/mainPage1.png"><br/>
                    <span class="sectionTitle">Mudanzas</span><br/>
                    <span class="sectionText">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</span>
                </td>

            </tr>
        </table>
    </div>
</div>
<?php
$this->end();

$this->start('subHeader'); ?>
<div id='subHeader'>
    <img src="/img/banner/banner2.png" title="Automatically generated caption"></li>
    <div id="subHeaderLeftNav"><a href="" class="leftNav"><</a></div>
    <div id="subHeaderRightNav"><a href="" class="rightNav"></a></div>
</div>
<?php $this->end();

$this->start('mainPage'); ?>
<div class="twoColumns">
    <div class="leftColumn">
        <h2 class="subSection">¿Qui&eacute;nes somos?</h2>
        <h4 class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h4>

        <p class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

        <p class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
    </div>

    <div class="rightColumn">
        <div id="rightSection">
            <div id="rightSectionHeader">
                Buscador de Cargas
            </div>
            <div id="rightSectionContent">

                <!--                    --><?php //echo $this->Session->flash('auth'); ?>
<!--                --><?php //echo $this->Form->create('Usuario'); ?>
<!--                <fieldset>-->
<!--                    --><?php
//                    echo $this->Form->input('usuario');
//                    echo $this->Form->input('clave');
//                    ?>
<!--                </fieldset>-->
<!--                <table>-->
<!--                    <tr>-->
<!--                        <td><a class="olvidoClave">Olvid&eacute; mi clave</a></td>-->
<!--                        <td>--><?php //echo $this->Form->end('Ingresar', array("cssClass" => "orangeButton")); ?><!--</td>-->
<!--                    </tr>-->
<!--                </table>-->


            </div>

        </div>
    </div>
</div>
<?php $this->end();

$this->start('underDividerContent'); ?>

<div class="truckBackgroundDiv">
    <div class="truckBackgroundDivContent">
        <h2 class="subSection">Preguntas Frecuentes</h2>
        <h4 class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</h4>

        <p class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

        <p class="subSection">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        <input class="orangeButton" type="submit" value="Leer más ..."/>
    </div>

</div>

<?php $this->end();
?>

