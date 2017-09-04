<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "db_main_menu".
 *
 * @property integer $id
 * @property string $label
 * @property string $icon
 * @property string $url
 * @property string $type
 * @property integer $onMobile
 * @property integer $sort
 * @property integer $active
 */
class MainMenuModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'db_main_menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['label', 'icon', 'url', 'type', 'onMobile', 'sort', 'active'], 'required', 'message' => 'กรุณากรอก {attribute}'],
            [['onMobile', 'sort', 'active'], 'integer'],
            [['label', 'url'], 'string', 'max' => 256],
            [['icon', 'type'], 'string', 'max' => 64],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'label' => 'Label',
            'icon' => 'Icon',
            'url' => 'Url',
            'type' => 'Type',
            'onMobile' => 'On Mobile',
            'sort' => 'Sort',
            'active' => 'Active',
        ];
    }
    
    public function getMenu() {
        $menu = [];
        $all = MainMenuModel::getShowAll();
        if($all){
            foreach ($all as $row) {
                array_push($menu,['label' => '<span class="'.$row->icon.'"></span> ' . $row->label, 'url' => [Yii::$app->seo->getUrl($row->url)],'active'=>(Yii::$app->controller->action->controller->id==MainMenuModel::getControlID($row->url))]);
            }
        }
        if (Yii::$app->user->isGuest) {
            $guest = MainMenuModel::getShowGuest();
            if($guest){
                foreach ($guest as $row) {
                    if($row->url == '#'){
                        array_push($menu,['label' => '<span class="'.$row->icon.'"></span> ' . $row->label, 'url' => FALSE,'options' => ['class' => 'cursor-pointer cd-signin','data-toggle' => 'modal','data-target' => '#SignModal','id' => 'modal-sign'],'active'=>(Yii::$app->controller->action->controller->id==MainMenuModel::getActivePersonal())]);
                    }
                    else{
                    array_push($menu,['label' => '<span class="'.$row->icon.'""></span> ' . $row->label, 'url' => [Yii::$app->seo->getUrl($row->url)]]);
                    }
                }
            }
        }
        else{
            $user = MainMenuModel::getShowUser();
            if($user){
                foreach ($user as $row) {
                    if($row->url == '#'){
                        array_push($menu,['label' => '<span class="'.$row->icon.'"></span> ' . Yii::$app->user->identity->username, 'url' => FALSE,'options' => ['data-toggle' => 'modal','data-target' => '#UserModal','id' => 'modal-user'],'active'=>(Yii::$app->controller->action->controller->id==MainMenuModel::getActivePersonal())]);
                    }else{
                        array_push($menu,['label' => '<span class="'.$row->icon.'"></span> ' . Yii::$app->user->identity->username, 'url' => [Yii::$app->seo->getUrl($row->url)],'active'=>(Yii::$app->controller->action->controller->id==MainMenuModel::getControlID($row->url))]);
                    }
                }
            }
        }
        return $menu;
        
    }
    
    public function getShowAll(){
        $model = MainMenuModel::find()->where(['type'=>'all', 'active'=>1])->orderBy(['sort'=>SORT_ASC])->all();
        return $model;
    }
    public function getShowGuest() {
        $model = MainMenuModel::find()->where(['type'=>'guest', 'active'=>1])->orderBy(['sort'=>SORT_ASC])->all();
        return $model;
    }
    public function getShowUser() {
        $model = MainMenuModel::find()->where(['type'=>'user', 'active'=>1])->orderBy(['sort'=>SORT_ASC])->all();
        return $model;
    }
    
    public function getControlID($control) {
        if($control == '/'){
            return 'wonder';
        }
        return $control;
    }
    
    public function getActivePersonal() {
        return 'personal';
    }
    
    public function getMenuBrush() {
        $menu = [];
        $all = MainMenuModel::getShowAll();
        if($all){
            foreach ($all as $row) {
                array_push($menu,'<li class="'.Yii::$app->controller->action->controller->id==$this->getControlID($row->url) ? 'current':''.'"><a href="' . Yii::$app->seo->getUrl($row->url) . '" class="external">' . $row->label. '</a></li>');
            }
        }
        if (Yii::$app->user->isGuest) {
            $guest = MainMenuModel::getShowGuest();
            if($guest){
                foreach ($guest as $row) {
                    if($row->url == '#'){
                        array_push($menu, '<li class="'.Yii::$app->controller->action->controller->id==$this->getControlID($row->url) ? 'current':''.'"><a href="' . Yii::$app->seo->getUrl($row->url) . '" class="external cd-signin" data-target="#SignModal" id="modal-sign">' . $row->label. '</a></li>');
                    }
                    else{
                        array_push($menu,'<li class="'.Yii::$app->controller->action->controller->id==$this->getControlID($row->url) ? 'current':''.'"><a href="' . Yii::$app->seo->getUrl($row->url) . '" class="external">' . $row->label. '</a></li>');
                    }
                }
            }
        }
        else{
            $user = MainMenuModel::getShowUser();
            if($user){
                foreach ($user as $row) {
                    if($row->url == '#'){
                        array_push($menu, '<li class="'.Yii::$app->controller->action->controller->id==$this->getControlID($row->url) ? 'current':''.'"><a href="' . Yii::$app->seo->getUrl($row->url) . '" class="external cd-signin" data-target="#UserModal" id="modal-user">' . $row->label. '</a></li>');
                    }else{
                        array_push($menu,'<li class="'.Yii::$app->controller->action->controller->id==$this->getControlID($row->url) ? 'current':''.'"><a href="' . Yii::$app->seo->getUrl($row->url) . '" class="external">' . $row->label. '</a></li>');
                    }
                }
            }
        }
        return $menu;
        
    }
}