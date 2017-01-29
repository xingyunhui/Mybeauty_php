<?php
class SignUpController extends Controller{
   public function actionSignUp(){
      $model = new SignUpForm;
      if(isset($_POST['SignUpForm'])){
          $model->attributes=$_POST['SignUpForm'];
      }
      var_dump($_POST['SignUpForm']);
      var_dump($model->attributes);
   
   }

   public function actionIndex(){
       $model = new SignUpForm;
       if(isset($_POST['SignUpForm'])){
           $model->attributes=$_POST['SignUpForm'];
               if($model->signUp()){
		  $this->redirect(Yii::app()->user->loginUrl);
               }

       }
       $this->render('signUp',array('model'=>$model));
   }
} 
