<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TravelModel */

$this->title = 'Update Travel Model: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Travel Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id_travel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="travel-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>