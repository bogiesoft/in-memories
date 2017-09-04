<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;

?>
<div class="row">
    <div class="col-md-12">
        <div class="memory cat-widget wdg-cat-opposite">
            <div class="widget-title">
                <h3><a href="/memory">MEMORY</a></h3>
                <span class="sub-title"><a href="/memory/view/<?= $memory->id ?>"><?= $memory->title ?></a></span>
                <span class="sub-title">comment</span>
                <div class="sep-widget-dou"></div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-content">
                <div class="memory-model-form">

                    <?php $form = ActiveForm::begin(); ?>


                    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'preset' => 'advance',
                        'clientOptions' => [
                                    'filebrowserUploadUrl' => '/uploads/upload.php'
                                ]
                    ]) ?>

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'โพสต์' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>