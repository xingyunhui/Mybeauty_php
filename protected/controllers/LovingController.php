<?php

class LovingController extends Controller{

    public function actionAdd(){
        
        $model = new LovingForm;
        if(isset($_POST['LovingForm'])){
            $model->attributes=$_POST['LovingForm'];
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
              $model = new LovingForm;
              $result = $model->removeItem($_GET);
              if($result){
                  $this->redirect('index');
              }
          }
    }

    public function actionBuy(){
          $model = new LovingForm;
          $result = $model->buyItem($_GET);
          if($result){
              $this->redirect('index');
          }
    }
    
    public function actionIndex(){
        if(!Yii::app()->user->isGuest) {
            $model = new LovingForm;
            $items = $model->getItems();
            if (!empty($items)) {
                $this->render('show', array('items' => $items));
                return;
            }
        }
        $this->render('index');
    }


}
