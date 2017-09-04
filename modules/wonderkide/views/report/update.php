<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReportModel */

$this->title = 'Update Report: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Report Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="report-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>