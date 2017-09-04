<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RulesModel */

$this->title = 'Update Rules: ' . $model->type;
$this->params['breadcrumbs'][] = ['label' => 'Rules Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="rules-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>