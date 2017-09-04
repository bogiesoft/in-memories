<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

?>

<div class="setting-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true,'readonly' => !$model->isNewRecord ? true : FALSE]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true/*,'readonly' => !$model->isNewRecord ? true : FALSE*/]) ?>

    <?= $form->field($model, 'data')->textInput(['maxlength' => true/*,'readonly' => !$model->isNewRecord ? true : FALSE*/]) ?>

    <?php echo $form->field($model, 'setting')->widget(SwitchInput::classname(), []); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>