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


//expend
if(MyController::checkPermissionRank('expend')){
    $expend = [];
    array_push($expend, ['label' => 'ข้อมูลรายรับ-รายจ่าย <i class="fa fa-file-image-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('expend')]), 'active' => ($item =='expend')]);
    array_push($expend, ['label' => 'จัดการรายรับ-รายจ่าย <i class="fa fa-file-image-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('expend/manage')]), 'active' => ($item =='expend/manage'||$item =='expend/update')]);
    array_push($expend, ['label' => 'เพิ่มบัญชี <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('expend/create')]), 'active' => ($item =='expend/create')]);
    if(MyController::checkPermissionRank('add-list-expend')){
        array_push($expend, ['label' => 'จัดการรายการหลัก <i class="fa fa-tags fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('expend/tags')]), 'active' => ($item =='expend/tags'||$item =='expend/tagschild'||$item =='expend/tagsupdate'||$item =='expend/createtags'||$item =='expend/tagsupdatechild'||$item =='expend/createtagschild')]);
    }
array_push($menu, ['label' => 'Expend', 'icon' => 'pencil', 'items' => $expend]);

       
}

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