<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GalleryImagesModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="gallery-images-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_gallery')->textInput(['readonly' => $permission]) ?>

    <?= $form->field($model, 'ref')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'file_name')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'real_name')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'path')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?= $form->field($model, 'sorting')->textInput(['readonly' => $permission]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>