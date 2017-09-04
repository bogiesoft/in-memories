<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueTopScoreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="league-top-score-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_top_score') ?>

    <?= $form->field($model, 'id_league') ?>

    <?= $form->field($model, 'rank') ?>

    <?= $form->field($model, 'player') ?>

    <?= $form->field($model, 'team') ?>

    <?php // echo $form->field($model, 'goal') ?>

    <?php // echo $form->field($model, 'season') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>