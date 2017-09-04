<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TagsModel */

$this->title = 'Update Tags Model: ' . ' ' . $model->id_tag;
$this->params['breadcrumbs'][] = ['label' => 'Tags Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tag, 'url' => ['view', 'id' => $model->id_tag]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tags-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>