
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\ColorInput;
use kartik\widgets\DatePicker;
?>

<div class="alert-model-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['maxlength' => true,'rows' => 4]) ?>
    
    <?php
    
        echo $form->field($model, 'theme')->widget(ColorInput::classname(), [
            'showDefaultPalette' => false,
            'options' => ['placeholder' => 'กรุณาเลือก theme ...','readonly' => true],
            'pluginOptions' => [
                'showInput' => true,
                'showInitial' => true,
                'showPalette' => true,
                'showPaletteOnly' => true,
                'showSelectionPalette' => true,
                'showAlpha' => false,
                //'allowEmpty' => false,
                'preferredFormat' => 'name',
                'palette' => [
                    [
                        "black", "grey", "brown", 
                    ],
                    [
                        "red", "orange", "yellow"
                    ],
                    [
                        "blue", "green", "magenta", 
                    ],
                ]
            ]
        ]);
    ?>
    <?php
        echo $form->field($model, 'show_date')->widget(DatePicker::classname(), [
            'options' => ['placeholder' => 'กรุณาเลือกวันที่ต้องการแจ้งเตือน ...'],
            'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy/mm/dd'
            ]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'สร้าง' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-danger' : 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>