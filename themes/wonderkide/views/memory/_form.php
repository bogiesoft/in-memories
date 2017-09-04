<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;
use kartik\widgets\Select2;
use app\models\GalleryModel;
use dosamigos\ckeditor\CKEditor;

$tags = GalleryModel::getTags();
//var_dump($tags);exit();
?>

<div class="memory-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textarea(['rows' => 2]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'advance',
        'clientOptions' => [
                    'filebrowserUploadUrl' => '/uploads/upload.php'
                ]
    ]) ?>

    <?php //echo $form->field($model, 'image_thumb')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'gallery_tags')->textInput(['maxlength' => true]) ?>
    
    
    <?php
    
    $tagVal = explode(',', $model->gallery_tags);
    
    // Without model and implementing a multiple select
    echo '<label class="control-label">Gallery ที่เกี่ยวข้อง</label>';
    echo Select2::widget([
        'name' => 'gallery_tags',
        'value' => $tagVal, // initial value
        'data' => $tags,
        'options' => [
            'placeholder' => 'Select tag ...',
            'multiple' => true,
            //3 => ['disabled' => true],
        ],
        
    ]);
    ?>
    <br>
    <?php //echo $form->field($model, 'video_tags')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'show')->widget(SwitchInput::classname(), []); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>