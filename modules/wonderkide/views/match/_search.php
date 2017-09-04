<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatchSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_match') ?>

    <?= $form->field($model, 'id_league') ?>

    <?= $form->field($model, 'home') ?>

    <?= $form->field($model, 'away') ?>

    <?= $form->field($model, 'play_time') ?>

    <?php // echo $form->field($model, 'h_odds') ?>

    <?php // echo $form->field($model, 'a_odds') ?>

    <?php // echo $form->field($model, 'bet') ?>

    <?php // echo $form->field($model, 'bet_team') ?>

    <?php // echo $form->field($model, 'h_score') ?>

    <?php // echo $form->field($model, 'a_score') ?>

    <?php // echo $form->field($model, 'comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>