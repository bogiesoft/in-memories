<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LeagueModel */

$this->title = 'Create League Model';
$this->params['breadcrumbs'][] = ['label' => 'League Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="league-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>