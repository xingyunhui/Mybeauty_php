<?php

class ItemsDBForm extends CActiveRecord{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'items';
    }

    public function primaryKey(){
        return 'id';
    }


}
