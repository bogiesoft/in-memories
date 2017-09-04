<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_expend".
 *
 * @property integer $id_note
 * @property integer $id_user
 * @property string $list
 * @property double $price
 * @property double $amount
 * @property string $date
 * @property integer $status
 */
class ExpendModel extends \yii\db\ActiveRecord
{
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_expend';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'price', 'date', 'status', 'tag'], 'required', 'message' => 'กรุณากรอก {attribute}' ],
            [['id_user', 'status'], 'integer'],
            [['price', 'amount'], 'number'],
            [['date'], 'safe'],
            [['list'], 'string', 'max' => 255],
            [['tag'], 'string', 'max' => 128],
            //[['tags'], 'validateRequired'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_note' => 'Id Note',
            'id_user' => 'Id User',
            'list' => 'รายละเอียดเพิ่มเติม',
            'price' => 'จำนวนเงิน',
            'amount' => 'จำนวน',
            'date' => 'วันที่',
            'status' => 'สถานะ',
            'tag' => 'รายการ',
            'tags' => 'รายการหลัก',
        ];
    }
    public function validateRequired($attribute, $params){
        //var_dump($this->attributes[$attribute]);exit();
        if(!$this->attributes[$attribute] || $this->attributes[$attribute] == ''){
            $this->addError($attribute, 'กรุณากรอกข้อมูล '.$this->attributeLabels());
        }
    }
}