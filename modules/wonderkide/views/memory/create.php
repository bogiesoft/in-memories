<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MemoryModel */

$this->title = 'Create Memory Model';
$this->params['breadcrumbs'][] = ['label' => 'Memory Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="memory-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>