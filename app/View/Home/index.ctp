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
        <h2>¿Qui&eacute;nes somos?</h2>
        <h4>aspdfaspdfjpaosid fjpaosi fasijfipsaj fisuahfo ihas douhfo iasdhfoiasu dfioas foi sihfoias dfoiau dfis asdfjpaosid fjpaosi fasijfipsaj fisuahfo ihas douhfo iasdhfoiasu dfioas foi sihfoias dfoiau dfis asdf</h4>
        <p>fasdf asdfads sadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd.
            ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dffsadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa df</p>
        <p>fasdf asdfads sadfa dsfoasd ifhoias dhof adhosif saa dfsadfa dsfoasd.
            ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhaifiosa df</p>
    </div>

    <div class="rightColumn">
        <div id="buscadorCargas">
            <div id="buscadorCargasHeader">
                Buscador de Cargas
            </div>
            fasdipfhasuhdfasdf
        </div>
    </div>


</div>
<?php $this->end();

$this->start('underDividerContent'); ?>
<h2>
    este es el content debajo del divider
</h2>
<?php $this->end();
?>

