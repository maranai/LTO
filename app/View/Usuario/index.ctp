<?php
/**
 * User: aarroyo
 */

$this->start('customHeadContent');
echo $this->Html->script('/js/bjqs-1.3.min');
echo $this->Html->script('/js/mainPage');
echo $this->Html->css('/css/bjqs');
$this->end();

$this->start('mainPage'); ?>

<?php
foreach($usuario as $user){
    echo $user->nombre;
}
?>


<?php $this->end();


?>

