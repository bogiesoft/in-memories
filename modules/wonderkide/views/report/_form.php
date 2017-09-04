<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\ReportModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="report-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'id_user')->textInput() ?>

    <?php //echo $form->field($model, 'id_user_report')->textInput() ?>

    <?php //echo $form->field($model, 'id_cat')->textInput() ?>

    <?php //echo $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'content')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'create_time')->textInput() ?>

    <?php echo $form->field($model, 'active')->widget(SwitchInput::classname(), []); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>