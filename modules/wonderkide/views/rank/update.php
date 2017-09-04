<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RankModel */

$this->title = 'Update Rank: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rank', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rank-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>