<?php
use yii\helpers\Url;
use kartik\widgets\SideNav;
use app\components\widgets\updateZeny;

//add personal css file
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@WDAsset')."/css/personal.css", [
    'depends' => ['yii\web\YiiAsset','yii\bootstrap\BootstrapAsset'],
]);
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@WDAsset')."/js/personal.js", ['depends' => [\yii\web\JqueryAsset::className()]]);

$type = SideNav::TYPE_INFO;
$heading = '<i class="glyphicon glyphicon-cog"></i> Personal';

$item = Yii::$app->urlManager->parseRequest(Yii::$app->request)[0];

$menu = [];


//message alert
array_push($menu, ['label' => 'ประวัติการเล่นเกม', 'icon' => 'play-circle', 'url' => Url::to([Yii::$app->seo->getUrl('games/history')]), 'active' => ($item =='games'||$item =='games/history'||$item =='games/ticket')]);

echo SideNav::widget([
    'type' => $type,
    'encodeLabels' => false,
    //'heading' => $heading,
    'items' => $menu
]);
?>

<section id="update-zeny">
    <?= updateZeny::widget(); ?>
</section>