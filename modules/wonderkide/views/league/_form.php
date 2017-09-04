<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LeagueModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="league-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'league_name_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'league_name_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'api_get_match')->textInput() ?>

    <?= $form->field($model, 'api_get_scores')->textInput() ?>
    
    <?= $form->field($model, 'link_get_odds')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link_get_scores')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link_get_topscore')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link_get_fixt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'link_get_result')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'link_get_result_sub')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'league_img')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>