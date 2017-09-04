<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_tags_custom".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $name
 * @property string $category
 * @property string $detail
 * @property integer $parent_id
 * @property integer $child
 */
class TagsCustomModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_tags_custom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'name', 'category', 'parent_id', 'child'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['id_user', 'parent_id', 'child'], 'integer'],
            [['name'], 'string', 'max' => 64],
            [['category'], 'string', 'max' => 128],
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
            'id_user' => 'Id User',
            'name' => 'รายการ',
            'category' => 'ประเภท',
            'detail' => 'รายละเอียดเพิ่มเติม',
            'parent_id' => 'Parent ID',
            'child' => 'Child',
        ];
    }
    
    //save by id tag
    public function findTagsByUser($cat) {

        $parent = TagsCustomModel::find()->where(['category' => $cat, 'parent_id' => 0, 'id_user' => Yii::$app->user->id])->all();
        
        $parentName = [];
        $tags = [];
        if($parent){

            for($i=0;$i<count($parent);$i++){
                $getChild[$i] = TagsCustomModel::find()->where(['category' => $cat, 'parent_id' => $parent[$i]['id'], 'id_user' => Yii::$app->user->id])->all();
                
                $parentName[$i] = $parent[$i]['name'];
            }

            for($i=0;$i<count($getChild);$i++){
                for($j=0;$j<count($getChild[$i]);$j++){
                    $tags[$parentName[$i]][$getChild[$i][$j]->id] = $getChild[$i][$j]->name;
                }
            }
            
        }
        return $tags;
    }
    
    //save by name tag
    public function findDataTagsByUser($cat) {

        $parent = TagsCustomModel::find()->where(['category' => $cat, 'parent_id' => 0, 'id_user' => Yii::$app->user->id])->all();
        
        $parentName = [];
        $tags = [];
        if($parent){

            for($i=0;$i<count($parent);$i++){
                $getChild[$i] = TagsCustomModel::find()->where(['category' => $cat, 'parent_id' => $parent[$i]['id'], 'id_user' => Yii::$app->user->id])->all();
                
                $parentName[$i] = $parent[$i]['name'];
            }

            for($i=0;$i<count($getChild);$i++){
                for($j=0;$j<count($getChild[$i]);$j++){
                    $tags[$parentName[$i]][$getChild[$i][$j]->name] = $getChild[$i][$j]->name;
                }
            }
            
        }
        return $tags;
    }
    
    public function getTagListByName($cat) {
        $model = TagsCustomModel::find()->where('parent_id != :id and category = :cat and id_user = :user', ['id'=>0, 'cat'=>$cat, 'user'=>Yii::$app->user->id])->all();
        $data = [];
        if($model){
            foreach ($model as $key => $row) {
                $data[$key]['id'] = $row->id;
                $data[$key]['name'] = $row->name;
                $data[$key]['from'] = 'custom';
            }
        }
        return $data;
    }
}