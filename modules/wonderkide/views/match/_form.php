<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MatchModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="match-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'id_league')->textInput() ?>

    <?= $form->field($model, 'home')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'away')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'play_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h_odds')->textInput() ?>

    <?= $form->field($model, 'a_odds')->textInput() ?>

    <?= $form->field($model, 'bet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bet_team')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'h_score')->textInput() ?>

    <?= $form->field($model, 'a_score')->textInput() ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>
    
    <?php echo $form->field($model, 'active')->dropDownList(Yii::$app->params['active']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>