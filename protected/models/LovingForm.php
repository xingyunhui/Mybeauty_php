<?php

/**
 * LovingForm class.
 * LovingForm is the data structure for keeping
 */
class LovingForm extends CFormModel
{
	public $username;
	public $brand;
        public $type;
        public $item;
        public $status;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array(' brand, type ,item', 'required'),
			// password needs to be authenticated
		);
	}

        public function getItems(){
             $items_db = new ItemsDBForm;
             $user_model = new LoginForm;
             $uid = intval($user_model->getUID(Yii::app()->user->name)); 
             $items_result = $items_db->findAll(
                 array(
                     'select'=>array('*'),
                     'condition' => 'status=:status AND uid=:uid',
                     'params' => array(':status'=>0,':uid' => $uid),
                 )
             );
            
             $items_array = array();
             foreach($items_result as $items){
                 $items_array[] = $items->attributes;
             }
             return $items_array;
        }

        public function removeItem($params){
            $this->brand = $params['brand'];
            $this->type = $params['type'];
            $this->item = $params['item'];
            $this->status = intval($params['status']);
            $items_db = new ItemsDBForm;
            $user_model = new LoginForm;
            $uid = intval($user_model->getUID(Yii::app()->user->name));
            
            $count = $items_db->deleteAll('uid=:uid and type=:type and item=:item and brand=:brand and status=:status',array(':uid'=>$uid ,':item'=>$this->item, ':brand'=>$this->brand, ':status'=>$this->status, ':type' => $this->type)); 
            if($count > 0){
                return TRUE;
            }
            return FALSE;
        }

        public function buyItem($params){
            $this->brand = $params['brand'];
            $this->type = $params['type'];
            $this->item = $params['item'];
            $this->status = intval($params['status']);
            $items_db = new ItemsDBForm;
            $user_model = new LoginForm;
            $uid = intval($user_model->getUID(Yii::app()->user->name));   
            if($this->status == 1){
                return TRUE;
            }
            $result = $items_db->updateAll(array('status'=>1),'status=:status and brand=:brand and type=:type and item=:item and uid=:uid',array(':uid'=>$uid ,':item'=>$this->item, ':brand'=>$this->brand, ':status'=>$this->status,':type' =>$this->type));
            if($result){
                return TRUE;
            }
            return FALSE;
        }
 
        public function addItems(){
           $user_model = new LoginForm;
           $uid = $user_model->getUID(Yii::app()->user->name);

           $items_db = new ItemsDBForm;
           $items_db->username = Yii::app()->user->name;
           $items_db->uid = intval($uid);
           $items_db->brand = $this->brand;
           $items_db->type = $this->type;
           $items_db->item = $this->item;
           $items_db->updated_time = time();
           $items_db->created_time = time();
           $items_db->status = 0;
           $items_db->save();
           

           return True;
        }
}
