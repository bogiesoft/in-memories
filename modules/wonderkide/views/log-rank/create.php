<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LogRankModel */

$this->title = 'Create Log Rank Model';
$this->params['breadcrumbs'][] = ['label' => 'Log Rank Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-rank-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>