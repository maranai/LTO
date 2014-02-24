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

$this->start('mainPage'); ?>
<div class="twoColumns">
    <div class="leftColumn">
        <h2 class="subSection">¿Usuario Nuevo?</h2>
        <h4 class="subSection">aspdfaspdfjpaosid fjpaosi fasijfipsaj fisuahfo ihas douhfo iasdhfoiasu dfioas foi sihfoias dfoiau dfis
            asdfjpaosid fjpaosi fasijfipsaj fisuahfo ihas douhfo iasdhfoiasu dfioas foi sihfoias dfoiau dfis asdf</h4>

        <p class="subSection">fasdf asdfads sadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhoias dhof adhosif sadi
            fios aifiosa dfsadfa dsfoasd.
            ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dffsadfa
            dsfoasd ifhoias dhof adhosif sadi fios aifiosa df</p>

        <p class="subSection">fasdf asdfads sadfa dsfoasd ifhoias dhof adhosif sadi fios aifiosa dfsadfa dsfoasd ifhoias dhof adhosif sadi
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

<!--                    --><?php //echo $this->Session->flash('auth'); ?>
                    <?php echo $this->Form->create('Usuario', array("action" => "login")); ?>
                    <fieldset>
                        <?php
                        echo $this->Form->input('email', array("id" => "email", "label" => "Correo electrónico")); ?>
                        <br />
                        <?php echo $this->Form->input('password', array("id" => "password", "label" => "Contraseña", "type"=>"password"));
                        ?>
                    </fieldset>
                    <table>
                        <tr>
                            <td><a class="olvidoClave">Olvid&eacute; mi clave</a></td>
                            <td><?php echo $this->Form->end('Ingresar', array("cssClass" => "orangeButton")); ?></td>
                        </tr>
                    </table>


            </div>

        </div>
    </div>
</div>
<?php $this->end();


?>

