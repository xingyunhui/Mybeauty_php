<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<h1 align=center>快，开启属于你自己的Beauty World吧!!!</h1>
<div align=center>
<?php echo CHtml::submitButton('ADD',array('onclick'=>"location.href='add'")); ?>
</div>
