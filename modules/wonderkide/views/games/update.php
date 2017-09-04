<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LogGameModel */

$this->title = 'Update Log Game Model: ' . ' ' . $model->id_game_log;
$this->params['breadcrumbs'][] = ['label' => 'Log Game Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_game_log, 'url' => ['view', 'id' => $model->id_game_log]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="log-game-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>