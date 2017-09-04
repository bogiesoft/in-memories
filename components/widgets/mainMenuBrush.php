<?php
namespace app\components\widgets;

use Yii;
use yii\base\Widget;
use app\models\MainMenuModel;

class mainMenuBrush extends Widget {
    
    private $menu;

    public function init() {
        $this->getMenu();
    }

    public function run() {
        return $this->render('mainMenuBrush', 
                [
                    'model' => $this->menu,
                ]);
    }
    
    public function getMenu() {
        $menu = [];
        $all = MainMenuModel::getShowAll();
        if($all){
            foreach ($all as $row) {
                if(Yii::$app->controller->action->controller->id.'/'.Yii::$app->controller->action->id == $this->getControlID($row->url))
                {
                    $active = 'current';
                }
                else if(Yii::$app->controller->action->controller->id == $row->url && (Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'view' || Yii::$app->controller->action->id == 'comment' || Yii::$app->controller->action->id == 'editcomment')){
                    $active = 'current';
                }
                else{
                    $active = '';
                }
                array_push($menu,'<li class="'.$active.'"><a href="' . Yii::$app->seo->getUrl($row->url) . '" class="external">' . $row->label. '</a></li>');
            }
        }
        if (Yii::$app->user->isGuest) {
            $guest = MainMenuModel::getShowGuest();
            if($guest){
                foreach ($guest as $row) {
                    
                    if(Yii::$app->controller->action->controller->id.'/'.Yii::$app->controller->action->id == $this->getControlID($row->url))
                    {
                        $active = 'current';
                    }
                    else{
                        $active = '';
                    }
                    if($row->url == '#'){
                        array_push($menu, '<li class="'.$active.'"><a class="external cd-signin" data-target="#SignModal" id="modal-sign">' . $row->label. '</a></li>');
                    }
                    else{
                        array_push($menu,'<li class="'.$active.'"><a href="' . Yii::$app->seo->getUrl($row->url) . '" class="external">' . $row->label. '</a></li>');
                    }
                }
            }
        }
        else{
            $user = MainMenuModel::getShowUser();
            if($user){
                array_push($menu,'<li class="hidden-xs" style="border-left:2px solid #17191c;">&nbsp;</li>');
                foreach ($user as $row) {
                    if(Yii::$app->controller->action->controller->id.'/'.Yii::$app->controller->action->id == $this->getControlID($row->url))
                    {
                        $active = 'current';
                    }
                    else{
                        $active = '';
                    }
                    if($row->url == '#' && $row->label == 'User'){
                        array_push($menu, '<li class="'.$this->checkActivePersonal().'"><a class="external modal-user" id="" title="' .Yii::$app->user->identity->username. '">' . '<span class="'.$row->icon.'"></span> ' . /*Yii::$app->user->identity->username.*/ '</a></li>');
                    }
                    else if($row->url == '#' && $row->label == 'Notify'){
                        $badge = '';
                        if(Yii::$app->user->identity->notify > 0){
                            $badge = '<span class="badge-wd notify-badge">' . Yii::$app->user->identity->notify. '</span>';
                        }
                        array_push($menu, '<li class="'.$active.'"><a class="external notify-list user-notify-badge" id="" for="' . Yii::$app->user->id. '">' . '<span class="'.$row->icon.'"> ' .$badge . '</span> ' . /*Yii::$app->user->identity->username.*/ '</a></li>');
                    }
                    else{
                        array_push($menu,'<li class="'.$active.'"><a href="' . Yii::$app->seo->getUrl($row->url) . '" class="external">' . $row->label. '</a></li>');
                    }
                }
            }
        }
        $this->menu = $menu;
        
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
            return 'wonder/index';
        }
        
        if(strpos($control, '/')!==FALSE){
            return $control;
        }
        return $control.'/index';
    }
    
    public function getFullURL($url) {
        return Yii::$app->seo->getUrl($url);
    }
    
    public function checkActivePersonal() {
        if(Yii::$app->controller->action->controller->id == 'personal'){
            return 'current';
        }
        else if(Yii::$app->controller->action->controller->id == 'memory' || Yii::$app->controller->action->controller->id == 'gallery'){
            if(Yii::$app->controller->action->id == 'index' || Yii::$app->controller->action->id == 'view' || Yii::$app->controller->action->id == 'comment' || Yii::$app->controller->action->id == 'editcomment'){
                return '';
            }
            else{
                return 'current';
            }
        }
        else if(Yii::$app->controller->action->controller->id == 'alert' || Yii::$app->controller->action->controller->id == 'expend' || Yii::$app->controller->action->controller->id == 'notify'){
            return 'current';
        }
        return '';
    }
    
    private function getUserNotify(){
        //$model = \app\models\UserModel::findOne($condition)
    }
}
