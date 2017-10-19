<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ExpendSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="expend-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_note') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'list') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'tag') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>