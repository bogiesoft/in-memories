<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\MemoryModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="memory-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'title')->textarea(['rows' => 6, 'readonly' => $permission]) ?>

    <?php //echo $form->field($model, 'content')->textarea(['rows' => 6, 'readonly' => $permission]) ?>
    <?php 
    if($permission){
        echo $form->field($model, 'content')->textarea(['rows' => 6,'readonly' => $permission]);
    }else{
        echo $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'advance',
        'clientOptions' => [
                    'filebrowserUploadUrl' => '/uploads/upload.php'
                ]
    ]);
    }?>

    <?php echo $form->field($model, 'create_time')->textInput(['readonly' => $permission]) ?>

    <?php echo $form->field($model, 'update_time')->textInput(['readonly' => $permission]) ?>

    <?php echo $form->field($model, 'image_thumb')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?php echo $form->field($model, 'gallery_tags')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?php echo $form->field($model, 'video_tags')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

    <?php echo $form->field($model, 'show')->widget(SwitchInput::classname(), ['readonly' => $permission]); ?>

    <?php echo $form->field($model, 'banned')->widget(SwitchInput::classname(), []); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>