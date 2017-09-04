<?php
use yii\helpers\Url;
use kartik\widgets\SideNav;
use app\components\MyController;

//add personal css file
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@WDAsset')."/css/personal.css", [
    'depends' => ['yii\web\YiiAsset','yii\bootstrap\BootstrapAsset'],
]);
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@WDAsset')."/js/personal.js", ['depends' => [\yii\web\JqueryAsset::className()]]);

$type = SideNav::TYPE_INFO;
$heading = '<i class="glyphicon glyphicon-cog"></i> Personal';

$item = Yii::$app->urlManager->parseRequest(Yii::$app->request)[0];

$menu = [];

//alert
if(MyController::checkPermissionRank('alert')){
array_push($menu, ['label' => 'Alert', 'icon' => 'time', 'url' => Url::to([Yii::$app->seo->getUrl('alert')]), 'active' => ($item =='alert' || $item =='alert/create'|| $item =='alert/update' || $item =='alert/index')]);
}

echo SideNav::widget([
    'type' => $type,
    'encodeLabels' => false,
    //'heading' => $heading,
    'items' => $menu
]);
