<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RankSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rank-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>
    
    <?= $form->field($model, 'name_th') ?>

    <?= $form->field($model, 'detail') ?>

    <?= $form->field($model, 'exp') ?>

    <?= $form->field($model, 'icon') ?>

    <?php // echo $form->field($model, 'permission') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>