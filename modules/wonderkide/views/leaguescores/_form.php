<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueScoresModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="league-scores-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'league_id')->textInput() ?>

    <?= $form->field($model, 'no')->textInput() ?>

    <?= $form->field($model, 'team_name')->textInput(['maxlength' => true]) ?>-->

    <?= $form->field($model, 'play')->textInput() ?>

    <?= $form->field($model, 'h_win')->textInput() ?>

    <?= $form->field($model, 'h_draw')->textInput() ?>

    <?= $form->field($model, 'h_lost')->textInput() ?>

    <?= $form->field($model, 'h_gfor')->textInput() ?>

    <?= $form->field($model, 'h_against')->textInput() ?>

    <?= $form->field($model, 'a_win')->textInput() ?>

    <?= $form->field($model, 'a_draw')->textInput() ?>

    <?= $form->field($model, 'a_lost')->textInput() ?>

    <?= $form->field($model, 'a_gfor')->textInput() ?>

    <?= $form->field($model, 'a_against')->textInput() ?>

    <?= $form->field($model, 'goal_dif')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'point')->textInput() ?>

    <!--<?= $form->field($model, 'form')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput() ?>

    <?= $form->field($model, 'group_cup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'season')->textInput(['maxlength' => true]) ?>-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
