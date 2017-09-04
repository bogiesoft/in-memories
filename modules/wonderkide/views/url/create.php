<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UrlModel */

$this->title = 'เพิ่ม Url ใหม่';
$this->params['breadcrumbs'][] = ['label' => 'Url Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="url-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>