<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FeelingCommentModel */

$this->title = 'Update Feeling Comment Model: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Feeling Comment Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="feeling-comment-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>