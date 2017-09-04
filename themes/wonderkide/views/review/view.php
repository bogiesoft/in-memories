<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BoardModel */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Board Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="review-header">
            <h1><?= Html::encode($this->title) ?></h1>
        </div>
        <div class="divider-head"></div>
        <div class="review-image">
            <?= Html::img("/uploads/img/review/".$type."/".$model->image) ?>
        </div>
        <div class="divider"></div>
        <div class="review-content">
            <?= Html::encode($model->content) ?>
        </div>

    
    </div>
</div>