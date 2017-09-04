<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueModel */

$this->title = 'Update League Model: ' . ' ' . $model->id_league;
$this->params['breadcrumbs'][] = ['label' => 'League Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_league, 'url' => ['view', 'id' => $model->id_league]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="league-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>