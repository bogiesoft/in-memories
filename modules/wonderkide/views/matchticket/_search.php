<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatchTicketSearchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-ticket-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_team_odds') ?>

    <?= $form->field($model, 'id_match') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'team_selected') ?>

    <?= $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'ip_address') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>