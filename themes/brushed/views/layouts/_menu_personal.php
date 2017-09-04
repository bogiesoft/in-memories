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

//personal

$personal = [];
array_push($personal, ['label' => 'ข้อมูลส่วนตัว', 'url' => Url::to([Yii::$app->seo->getUrl('personal')]), 'active' => ($item =='personal' ||$item =='personal/index')]);
array_push($personal, ['label' => 'จัดการข้อมูลส่วนตัว', 'url' => Url::to([Yii::$app->seo->getUrl('personal/editprofile')]), 'active' => ($item =='personal/editprofile')]);
if(MyController::checkPermissionRank('img-profile')){
    array_push($personal, ['label' => 'จัดการรูปโปรไฟล์', 'url' => Url::to([Yii::$app->seo->getUrl('personal/photo')]), 'active' => ($item =='personal/photo')]);
}
array_push($personal, ['label' => 'เปลี่ยน Password', 'url' => Url::to([Yii::$app->seo->getUrl('personal/password')]), 'active' => ($item =='personal/password')]);
array_push($personal, ['label' => 'Rank', 'url' => Url::to([Yii::$app->seo->getUrl('personal/rank')]), 'active' => ($item =='personal/rank')]);

array_push($menu, ['label' => 'ข้อมูลส่วนตัว', 'icon' => 'user', 'items' => $personal]);

//PM
array_push($menu, ['label' => 'ข้อความส่วนตัว', 'icon' => 'envelope', 'items' => [
            ['label' => 'ส่ง <i class="fa fa-paper-plane fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/sent')]), 'active' => ($item =='personal/sent')],
            ['label' => 'กล่องข้อความ <i class="fa fa-folder-open fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/inbox')]), 'active' => ($item =='personal/inbox'||$item =='personal/view_pm')],
            ['label' => 'ประวิติการส่งข้อความ <i class="fa fa-exchange fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('personal/sentbox')]), 'active' => ($item =='personal/sentbox')]
        ]]);

//memory
array_push($menu, ['label' => 'Memory', 'icon' => 'floppy-disk', 'items' => [
            ['label' => 'กล่องความทรงจำ <i class="fa fa-book fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('memory/manage')]), 'active' => ($item =='memory/manage' || $item =='memory/update')],
            ['label' => 'เพิ่มความทรงจำ <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('memory/create')]), 'active' => ($item =='memory/create')],
        ]]);

//gallery
array_push($menu, ['label' => 'Gallery', 'icon' => 'picture', 'items' => [
            ['label' => 'แกลอรี่ส่วนตัว <i class="fa fa-file-image-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('gallery/personal')]), 'active' => ($item =='gallery/personal')],
            ['label' => 'จัดการแกลอรี่ <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('gallery/manage')]), 'active' => ($item =='gallery/manage')],
        ]]);

//alert
if(MyController::checkPermissionRank('alert')){
array_push($menu, ['label' => 'Alert', 'icon' => 'time', 'url' => Url::to([Yii::$app->seo->getUrl('alert')]), 'active' => ($item =='alert' || $item =='alert/create'|| $item =='alert/update' || $item =='alert/index')]);
}

//expend
if(MyController::checkPermissionRank('expend')){
    $expend = [];
    array_push($expend, ['label' => 'จัดการรายรับ-รายจ่าย <i class="fa fa-file-image-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('expend/manage')]), 'active' => ($item =='expend/manage'||$item =='expend/update')]);
    array_push($expend, ['label' => 'เพิ่มบัญชี <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('expend/create')]), 'active' => ($item =='expend/create')]);
    if(MyController::checkPermissionRank('add-list-expend')){
        array_push($expend, ['label' => 'จัดการรายการหลัก <i class="fa fa-tags fa-lg" aria-hidden="true"></i>', 'url' => Url::to([Yii::$app->seo->getUrl('expend/tags')]), 'active' => ($item =='expend/tags'||$item =='expend/tagschild'||$item =='expend/tagsupdate'||$item =='expend/createtags'||$item =='expend/tagsupdatechild'||$item =='expend/createtagschild')]);
    }
array_push($menu, ['label' => 'Expend', 'icon' => 'pencil', 'items' => $expend]);

       
}

//message alert
array_push($menu, ['label' => 'การแจ้งเตือน', 'icon' => 'exclamation-sign', 'url' => Url::to([Yii::$app->seo->getUrl('notify')]), 'active' => ($item =='notify')]);

echo SideNav::widget([
    'type' => $type,
    'encodeLabels' => false,
    //'heading' => $heading,
    'items' => $menu
]);
