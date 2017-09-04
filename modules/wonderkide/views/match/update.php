<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MatchModel */

$this->title = 'Update Match Model: ' . ' ' . $model->id_match;
$this->params['breadcrumbs'][] = ['label' => 'Match Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_match, 'url' => ['view', 'id' => $model->id_match]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="match-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>