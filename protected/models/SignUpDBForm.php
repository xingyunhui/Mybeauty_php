<?php

class SignUpDBForm extends CActiveRecord{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'user';
    }

    public function primaryKey(){
        return 'id';
    }


}
