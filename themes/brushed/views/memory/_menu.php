<?php
use yii\helpers\Url;
use kartik\widgets\SideNav;
use app\components\MyController;
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

//memory
array_push($menu, ['label' => 'Memory', 'icon' => 'floppy-disk', 'items' => [
            ['label' => 'กล่องความทรงจำ <i class="fa fa-book fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('memory/manage')]), 'active' => ($item =='memory/manage' || $item =='memory/update')],
            ['label' => 'เพิ่มความทรงจำ <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('memory/create')]), 'active' => ($item =='memory/create')],
        ]]);

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