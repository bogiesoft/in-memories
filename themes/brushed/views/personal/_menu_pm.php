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

//PM
array_push($menu, ['label' => 'ข้อความส่วนตัว', 'icon' => 'envelope', 'items' => [
            ['label' => 'ส่ง <i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/sent')]), 'active' => ($item =='personal/sent')],
            ['label' => 'กล่องข้อความ <i class="fa fa-folder-open fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/inbox')]), 'active' => ($item =='personal/inbox'||$item =='personal/view_pm')],
            ['label' => 'ประวิติการส่งข้อความ <i class="fa fa-exchange fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/sentbox')]), 'active' => ($item =='personal/sentbox')]
        ]]);

echo SideNav::widget([
    'type' => $type,
    'encodeLabels' => false,
    //'heading' => $heading,
    'items' => $menu
]);