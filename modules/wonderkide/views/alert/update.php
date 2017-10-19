<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AlertModel */

$this->title = 'Update Alert Model: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Alert Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="alert-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>