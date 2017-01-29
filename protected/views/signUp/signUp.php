<?php
/* @var $this SiteController */

//$this->pageTitle=Yii::app()->name;
$this->pageTitle=Yii::app()->name . ' - SignUp';
$this->breadcrumbs=array(
    'SignUp',
);
//$model = new SignUpForm;
?>

<h1>SignUp</h1>
<p>please fill out the following form with your signup credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'signUp-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
)); ?>


    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email'); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'username'); ?>
        <?php echo $form->textField($model,'username'); ?>
        <?php echo $form->error($model,'username'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'password'); ?>
        <?php echo $form->passwordField($model,'password'); ?>
        <?php echo $form->error($model,'password'); ?>
    </div>


    <div class="row">
        <?php echo $form->labelEx($model,'repassword'); ?>
        <?php echo $form->passwordField($model,'repassword'); ?>
        <?php echo $form->error($model,'repassword'); ?>
    </div>

<!    <div class="row">
<!        <?php $form=$this->beginWidget('CActiveForm');?>
<!        <?php $this->widget('CCaptcha');?>
<!        <?php echo $form->textField($model,'verifyCode'); ?>
<!        <?php echo $form->error($model,'verifyCode'); ?>
<!        <?php $this->endWidget(); ?>
<!    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton('SignUp'); ?>
    </div>
    <?php $this->endWidget(); ?>

</div>
