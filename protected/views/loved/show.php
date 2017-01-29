<?php
/* @var $this SiteController */

//$this->pageTitle=Yii::app()->name;
$this->pageTitle=Yii::app()->name . ' - Loved';
$this->breadcrumbs=array(
    'Loved',
);
//$model = new SignUpForm;
?>


<h1>Loved</h1>
<div class="row buttons">
    <?php echo CHtml::submitButton('ADD',array('onclick'=>"location.href='add'")); ?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'loved-form',
        'enableClientValidation'=>true,
        'clientOptions'=>array(
                'validateOnSubmit'=>true,
        ),
)); ?>

<div class="form">
    <table border="10"   width="100%">
        <tr>
            <td height="40" colspan="2" style="font-size:15px;text-align:center">序号</td>
            <td height="40" colspan="2" style="font-size:15px;text-align:center">品牌</td>
            <td height="40" colspan="2" style="font-size:15px;text-align:center">功能</td>
            <td height="40" colspan="2" style="font-size:15px;text-align:center">名称</td>
            <td height="40" colspan="2" style="font-size:15px;text-align:center">操作</td>
        </tr>
        <?php
                $no = 1;
                $str = '<td height="40" colspan="2" style="font-size:15px;text-align:center">';
            foreach($items as $item){
                echo '<tr>'.$str.$no.'</td>';
                echo $str.$item['brand'].'</td>';
                echo $str.$item['type'].'</td>';
                echo $str.$item['item'].'</td>';
                //echo $str.CHtml::submitButton('删',array('onclick'=>"location.href='remove'")).CHtml::submitButton('败',array('onclick'=>"location.href='buy'")).'</td>';`
                $url_remove="remove?".http_build_query($item);
                $url_buy="buy?".http_build_query($item);
                echo $str.'<a href='.$url_remove.'>种草</a>'.'</td>';
                
                echo '</tr>';
                $no += 1;
            }
        ?>
    
    </table>
    <?php $this->endWidget(); ?>

</div>
