<?php
/**
 * User: aarroyo
 * Date: 1/30/14
 */

$this->start('customHeadContent');
echo $this->Html->script('/js/mainPage');
$this->end();

$this->start('pageDividerContent'); ?>
<div class="pageDivider">
    <div class="page">
        <h2>¿Cómo funciona fletescr.com?</h2>
        <table class="pageDividerTable">
            <tr>
                <td>
                    <img src="../img/mainpage1.png"><br/>
                    <span class="sectionTitle">Transportes</span><br/>
                    <span class="sectionText">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</span>
                </td>
                <td>
                    <img src="../img/mainpage1.png"><br/>
                    <span class="sectionTitle">Servicio Carga</span><br/>
                    <span class="sectionText">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco</span>
                </td>

                <td>
                    <img src="../img/mainpage1.png"><br/>
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
<!--<div id='subHeader'>-->
<!--    <img src="/img/banner/banner2.png" title="Automatically generated caption"></li>-->
<!--    <div id="subHeaderLeftNav"><a href="" class="leftNav"><</a></div>-->
<!--    <div id="subHeaderRightNav"><a href="" class="rightNav"></a></div>-->
<!--</div>-->
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


<!--                --><?php //echo $this->form->create('Carga',array('action'=>'search'));?>
<!--                <fieldset>-->
                    <!--                    <legend>--><?php //__('Post Search');?><!--</legend>-->
                    <?php
//                    echo $this->form->input('Search.keywords');
//                    echo $this->form->input('Search.id');
//                    echo $this->form->input('Search.name',array('after'=>__('wildcard is *',true)));
//                    echo $this->form->input('Search.body',array('after'=>__('wildcard is *',true)));
//                    echo $this->form->input('Search.active',array(
//                        'empty'=>__('Any',true),
//                        'options'=>array(
//                            0=>__('Inactive',true),
//                            1=>__('Active',true),
//                        ),
//                    ));
//                    echo $this->form->input('Search.created', array('after'=>'eg: >= 2 weeks ago'));
//                    echo $this->form->input('Search.category_id');
//                    echo $this->form->input('Search.tag');
//                    echo $this->form->input('Search.tag_id');
//                    echo $this->form->submit('Search');
//                    ?>
<!--                </fieldset>-->
<!--                --><?php //echo $this->form->end();?>

                <table style="color: white;">
                    <tr style="height: 30px;">
                        <td>
                            Origen:
                        </td>
                    </tr>
                    <tr style="height: 30px;">
                        <td>
                            <select name="bcOrigen" id="bcOrigen" placeholder="Origen">
                                <option value="1">Alajuela</option>
                                <option value="1">Heredia</option>
                                <option value="1">San José</option>
                                <option value="1">Cartago</option>
                                <option value="1">Limón</option>
                                <option value="1">Puntarenas</option>
                                <option value="1">Guanacaste</option>
                            </select>
                        </td>
                    </tr>
                    <tr style="height: 30px;">
                        <td>
                            Destino:
                        </td>
                    </tr>
                    <tr style="height: 30px;">
                        <td>
                            <select name="bcOrigen" id="bcDestino" placeholder="bcDestino">
                                <option value="1">Alajuela</option>
                                <option value="1">Heredia</option>
                                <option value="1">San José</option>
                                <option value="1">Cartago</option>
                                <option value="1">Limón</option>
                                <option value="1">Puntarenas</option>
                                <option value="1">Guanacaste</option>
                            </select>
                        </td>
                    </tr>

                    <tr style="height: 30px;">
                        <td>
                            Tipo de Mercancía
                        </td>
                    </tr>
                    <tr style="height: 30px;">
                        <td>
                            <input placeholder="Mercancía">
                        </td>
                    </tr>

                    <tr style="height: 55px; vertical-align:bottom;" class="paddingTop5">
                        <td><input name="btnSubmit" type="submit" id="btnSubmit" value="Buscar" class="orangeButtonWithBackground"></td>
                    </tr>
                </table>

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

