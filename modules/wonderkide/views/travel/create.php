<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TravelModel */

$this->title = 'Create Travel Model';
$this->params['breadcrumbs'][] = ['label' => 'Travel Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="travel-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>