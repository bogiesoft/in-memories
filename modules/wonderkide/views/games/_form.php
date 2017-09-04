<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LogGameModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="log-game-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_user')->textInput() ?>

    <?= $form->field($model, 'game_type')->textInput() ?>

    <?= $form->field($model, 'play_count')->textInput() ?>

    <?= $form->field($model, 'zeny')->textInput() ?>

    <?= $form->field($model, 'play_date')->textInput() ?>

    <?= $form->field($model, 'play_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>