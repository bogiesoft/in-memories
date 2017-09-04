<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LeagueTopScoreModel */

$this->title = 'Create League Top Score Model';
$this->params['breadcrumbs'][] = ['label' => 'League Top Score Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="league-top-score-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>