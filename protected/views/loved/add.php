<?php
/* @var $this SiteController */

//$this->pageTitle=Yii::app()->name;
$this->pageTitle=Yii::app()->name . ' - Add';
$this->breadcrumbs=array(
    'ADD',
);
//$model = new SignUpForm;
?>

<h1>ADD</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'loved-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
        'validateOnSubmit'=>true,
        ),
)); ?>


    <div class="row">
        <?php echo $form->labelEx($model,'brand'); ?>
        <?php echo $form->textField($model,'brand'); ?>
        <?php echo $form->error($model,'brand'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'type'); ?>
        <?php echo $form->textField($model,'type'); ?>
        <?php echo $form->error($model,'type'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'item'); ?>
        <?php echo $form->textField($model,'item'); ?>
        <?php echo $form->error($model,'item'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('添加'); ?>
    </div>
    <?php $this->endWidget(); ?>

</div>
