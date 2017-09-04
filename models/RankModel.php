<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_rank".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_th
 * @property string $detail
 * @property string $exp
 * @property string $icon
 * @property integer $permission
 */
class RankModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_rank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'name_th', 'permission'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['permission', 'exp'], 'integer'],
            [['name', 'name_th', 'icon'], 'string', 'max' => 128],
            [['detail'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'name' => 'Name TH',
            'detail' => 'Detail',
            'exp' => 'Exp',
            'icon' => 'Icon',
            'permission' => 'Permission',
        ];
    }
    
    public function genToDropdown() {
        $model = RankModel::find()->all();
        $data = [];
        foreach ($model as $value) {
            $data[$value->id] = $value->name;
        }
        return $data;
    }
    public function getName($id) {
        $model = RankModel::findOne($id);
        if($model){
            return $model->name;
        }
        return null;
    }
    
    public function checkUpRank($id, $exp) {
        $model = RankModel::findOne($id);
        //$next = RankModel::find()->where('exp <= :exp', ['exp'=>  $exp])->orderBy(['exp'=>SORT_DESC])->one();
        $next = RankModel::find()->where(['>', 'exp', $model->exp])->andWhere(['permission'=> 1])->orderBy(['exp'=>SORT_ASC])->one();
        if($model && $next && $exp >= $next->exp){
            return $next;
        }
        return null;
    }
}