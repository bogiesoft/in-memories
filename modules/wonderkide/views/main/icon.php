<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<section class="manage-icon">
    <h2>จัดการ ICON</h2>
    <?php 
    if(!$model->isNewRecord){ 

    echo Html::img($model->content, ['title'=>$model->title, 'style'=>'max-height:200px']);
    
    } ?>

    <div class="travel-model-form">

        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <?= $form->field($model, 'imageFile')->fileInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Upload' : 'Change', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</section>