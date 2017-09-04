<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ContentModel */

$this->title = 'Update : ' . ' ' . $model->type;
$this->params['breadcrumbs'][] = ['label' => 'Content Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_content]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="content-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>