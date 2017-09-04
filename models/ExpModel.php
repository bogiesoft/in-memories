<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_exp".
 *
 * @property integer $id
 * @property string $category
 * @property integer $exp
 * @property integer $count_bonus
 * @property integer $exp_bonus
 * @property string $other
 */
class ExpModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_exp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'exp'], 'required'],
            [['exp', 'count_bonus', 'exp_bonus'], 'integer'],
            [['category'], 'string', 'max' => 64],
            [['other'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category' => 'Category',
            'exp' => 'Exp',
            'count_bonus' => 'Count Bonus',
            'exp_bonus' => 'Exp Bonus',
            'other' => 'Other',
        ];
    }
}