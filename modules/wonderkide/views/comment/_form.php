<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use dosamigos\ckeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model app\models\CommentModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //echo $form->field($model, 'id_user')->textInput(['readonly' => $permission]) ?>

    <?php echo $form->field($model, 'id_parent')->textInput(['readonly' => $permission]) ?>

    <?php echo $form->field($model, 'id_cat')->textInput(['readonly' => $permission]) ?>

    <?php echo $form->field($model, 'category')->textInput(['maxlength' => true, 'readonly' => $permission]) ?>

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

    <?php //echo $form->field($model, 'create_time')->textInput(['readonly' => $permission]) ?>

    <?php //echo $form->field($model, 'update_time')->textInput(['readonly' => $permission]) ?>
    
    <?php echo $form->field($model, 'banned')->widget(SwitchInput::classname(), ['readonly' => $permission]); ?>

    <?php //echo $form->field($model, 'create_ip')->textInput(['maxlength' => true,'readonly' => $permission]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>