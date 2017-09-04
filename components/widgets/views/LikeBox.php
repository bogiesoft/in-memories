<?php
use rmrevin\yii\fontawesome\FA;
rmrevin\yii\fontawesome\AssetBundle::register($this);
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@WDAsset')."/likebox/likebox.css", [
    'depends' => ['yii\web\YiiAsset','yii\bootstrap\BootstrapAsset'],
]);
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/likebox/likeBox.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

?>
<ul class="nav-pills navbar-<?= $position ?> list-style-none">
    <li><a id="like-<?= $category ?>-<?= $model->id ?>" data-owner="<?= $model->id_user ?>" data-cat="<?= $model->id ?>" data-sub-cat="<?= $sub_category ?>" data-type="<?= $category ?>" class="btn-like-style btn-like <?= $isLike == 1 ? "plus" : "" ?>"><?= FA::i('thumbs-up') ?><span class="badge"><?= $like ?></span></a></li>
    <li><a id="unlike-<?= $category ?>-<?= $model->id ?>" data-owner="<?= $model->id_user ?>" data-cat="<?= $model->id ?>" data-sub-cat="<?= $sub_category ?>" data-type="<?= $category ?>" class="btn-like-style btn-unlike <?= $isLike == -1 ? "plus" : "" ?>"><?= FA::i('thumbs-down') ?><span class="badge"><?= $unlike ?></span></a></li>
</ul>

