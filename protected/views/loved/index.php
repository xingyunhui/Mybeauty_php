<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<h1 align=center>加油哟，努力赚钱买买买!!!</h1>
<div align=center>
<?php echo CHtml::submitButton('ADD',array('onclick'=>"location.href='add'")); ?>
</div>
