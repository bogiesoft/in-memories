<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_tags".
 *
 * @property integer $id_tag
 * @property string $name_th
 * @property string $name_en
 * @property string $category
 * @property integer $group
 * @property integer $parent_id
 */
class TagsModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_th', 'name_en', 'category', 'group', 'parent_id'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['group', 'parent_id'], 'integer'],
            [['name_th', 'name_en', 'category'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tag' => 'Id Tag',
            'name_th' => 'Name Th',
            'name_en' => 'Name En',
            'category' => 'Category',
            'group' => 'Group',
            'parent_id' => 'Parent ID',
        ];
    }
    
    //save by id tag
    public function findTags($cat, $group) {
        //var_dump($group);exit();
        if($group){
            $parent = TagsModel::find()->where(['category' => $cat, 'group' => $group, 'parent_id' => 0])->all();
        }
        else{
            $parent = TagsModel::find()->where(['category' => $cat, 'parent_id' => 0])->all();
        }
        $parentName = [];
        $tags = [];
        if($parent){

            for($i=0;$i<count($parent);$i++){
                if($group){
                    $getChild[$i] = TagsModel::find()->where(['category' => $cat, 'group' => $group, 'parent_id' => $parent[$i]['id_tag']])->all();
                }
                else{
                    $getChild[$i] = TagsModel::find()->where(['category' => $cat, 'parent_id' => $parent[$i]['id_tag']])->all();
                }
                $parentName[$i] = $parent[$i]['name_th'];
            }

            for($i=0;$i<count($getChild);$i++){
                for($j=0;$j<count($getChild[$i]);$j++){
                    $tags[$parentName[$i]][$getChild[$i][$j]->id_tag] = $getChild[$i][$j]->name_th;
                }
            }
            
        }
        return $tags;
    }
    
    //save by name tag
    public function findDataTags($cat, $group) {
        //var_dump($group);exit();
        if($group){
            $parent = TagsModel::find()->where(['category' => $cat, 'group' => $group, 'parent_id' => 0])->all();
        }
        else{
            $parent = TagsModel::find()->where(['category' => $cat, 'parent_id' => 0])->all();
        }
        $parentName = [];
        $tags = [];
        if($parent){

            for($i=0;$i<count($parent);$i++){
                if($group){
                    $getChild[$i] = TagsModel::find()->where(['category' => $cat, 'group' => $group, 'parent_id' => $parent[$i]['id_tag']])->all();
                }
                else{
                    $getChild[$i] = TagsModel::find()->where(['category' => $cat, 'parent_id' => $parent[$i]['id_tag']])->all();
                }
                $parentName[$i] = $parent[$i]['name_th'];
            }

            for($i=0;$i<count($getChild);$i++){
                for($j=0;$j<count($getChild[$i]);$j++){
                    $tags[$parentName[$i]][$getChild[$i][$j]->name_th] = $getChild[$i][$j]->name_th;
                }
            }
            
        }
        return $tags;
    }
    
    public function getTagName($tag) {
        if($tag && $tag != ''){
            $tagVal = explode(',', $tag);
            $get = [];
            foreach ($tagVal as $key => $value) {
                $model = TagsModel::findOne($value);
                $get[$key] = $model->name_th;
            }
            return implode(',', $get);
        }
        return null;
    }
    
    public function genTagByParent($id) {
        $model = TagsModel::find()->where(['parent_id' => $id])->all();
        $data = '';
        if($model){
            foreach ($model as $row) {
                $data .= '<p>'.$row->name_th.'</p>';
            }
        }
        return $data;
    }
    
    public function getTagListByName($cat) {
        $model = TagsModel::find()->where('parent_id != :id and category = :cat', ['id'=>0, 'cat'=>$cat])->all();
        $data = [];
        if($model){
            foreach ($model as $key => $row) {
                $data[$key]['id'] = $row->id_tag;
                $data[$key]['name'] = $row->name_th;
                $data[$key]['from'] = 'original';
            }
        }
        return $data;
    }

}