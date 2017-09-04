<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LogGameSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-game-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_game_log') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'game_type') ?>

    <?= $form->field($model, 'play_count') ?>

    <?= $form->field($model, 'zeny') ?>

    <?php // echo $form->field($model, 'play_date') ?>

    <?php // echo $form->field($model, 'play_ip') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>