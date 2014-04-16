<?php
/**
 * User: aarroyo
 */

$this->start('customHeadContent');
echo $this->Html->script('/js/mainPage');
$this->end();

$this->start('mainPage'); ?>

<?php
foreach($usuario as $user){
    echo $user->nombre;
}
?>


<?php $this->end();


?>

