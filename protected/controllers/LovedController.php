<?php

class LovedController extends Controller{

    public function actionAdd(){
        
        $model = new LovedForm;
        if(isset($_POST['LovedForm'])){
            $model->attributes=$_POST['LovedForm'];
            $result = $model->addItems();
            if($result){
                $this->redirect('index');
                //return;
            }
        }
        $this->render('add',array('model'=>$model));
    }
    
    public function actionRemove(){
          if(isset($_GET)){
              $model = new LovedForm;
              $result = $model->removeItem($_GET);
              if($result){
                  $this->redirect('index');
              }
          }
    }

    public function actionBuy(){
          $model = new LovedForm;
          $result = $model->buyItem($_GET);
          if($result){
              $this->redirect('index');
          }
    }
    
    public function actionIndex(){
        if(!Yii::app()->user->isGuest) {
            $model = new LovedForm;
            $items = $model->getItems();
            if (!empty($items)) {
                $this->render('show', array('items' => $items));
                return;
            }
        }
        $this->render('index');
    }


}
