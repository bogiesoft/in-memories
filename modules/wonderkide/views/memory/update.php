<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MemoryModel */

$this->title = 'จัดการ Memory : ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Memory Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="memory-model-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'permission' => $permission,
    ]) ?>

</div>