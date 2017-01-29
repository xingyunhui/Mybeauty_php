<?php
class TestController extends Controller{
    
    public function actionHello(){

        var_dump(Yii::app()->cache);
        echo '<a href="https://www.baidu.com"> Hello World! </a>';
        $this->widget('application.widgets.TestWidget');
    }


}
