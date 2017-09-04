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

//gallery
array_push($menu, ['label' => 'Gallery', 'icon' => 'picture', 'items' => [
        ['label' => 'จัดการแกลอรี่ <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('gallery/personal')]), 'active' => ($item =='gallery/manage' || $item =='gallery/personal') ],
        ['label' => 'เพิ่ม <i class="fa fa-file-image-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('gallery/add')]), 'active' => ($item =='gallery/add')],
            
        ]]);

echo SideNav::widget([
    'type' => $type,
    'encodeLabels' => false,
    //'heading' => $heading,
    'items' => $menu
]);
