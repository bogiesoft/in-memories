<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FooterModel */

$this->title = 'แก้ไข Footer : ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Footer Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_footer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="footer-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>