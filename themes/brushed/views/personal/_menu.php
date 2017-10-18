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

//personal

$personal = [];
array_push($personal, ['label' => 'ข้อมูลส่วนตัว', 'url' => Url::to([Yii::$app->seo->getUrl('personal')]), 'active' => ($item =='personal' ||$item =='personal/index')]);
array_push($personal, ['label' => 'จัดการข้อมูลส่วนตัว <i class="fa fa-user fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/editprofile')]), 'active' => ($item =='personal/editprofile')]);
if(MyController::checkPermissionRank('img-profile')){
    array_push($personal, ['label' => 'จัดการรูปโปรไฟล์ <i class="fa fa-file-image-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/photo')]), 'active' => ($item =='personal/photo')]);
}
array_push($personal, ['label' => 'เปลี่ยน Password <i class="fa fa-key fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/password')]), 'active' => ($item =='personal/password')]);
array_push($personal, ['label' => 'Rank <i class="fa fa-level-up fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/rank')]), 'active' => ($item =='personal/rank')]);

array_push($menu, ['label' => 'ข้อมูลส่วนตัว', 'icon' => 'user', 'items' => $personal]);

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