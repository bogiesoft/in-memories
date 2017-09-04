<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueTopScoreModel */

$this->title = 'Update League Top Score Model: ' . ' ' . $model->id_top_score;
$this->params['breadcrumbs'][] = ['label' => 'League Top Score Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_top_score, 'url' => ['view', 'id' => $model->id_top_score]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="league-top-score-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>