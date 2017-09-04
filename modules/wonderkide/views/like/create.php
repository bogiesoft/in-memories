<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LikeDataModel */

$this->title = 'Create Like Data Model';
$this->params['breadcrumbs'][] = ['label' => 'Like Data Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="like-data-model-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>