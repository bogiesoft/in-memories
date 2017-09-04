<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\GalleryModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ref')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'create_date')->textInput(['readonly' => $permission]) ?>

    <?php echo $form->field($model, 'show')->widget(SwitchInput::classname(), ['readonly' => $permission]); ?>

    <?php echo $form->field($model, 'banned')->widget(SwitchInput::classname(), []); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>