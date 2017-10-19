<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ExpendModel */

$this->title = 'Update Expend Model: ' . $model->id_note;
$this->params['breadcrumbs'][] = ['label' => 'Expend Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_note, 'url' => ['view', 'id' => $model->id_note]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="expend-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>