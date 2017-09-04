<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use kartik\widgets\DatePicker;


?>

<div class="note-model-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    //$model->tags = explode(',', $model->tag);

    echo $form->field($model, 'tag')->widget(Select2::classname(), [
        'data' => $tags,
        'options' => ['placeholder' => 'เลือกรายการ ...'],
        'pluginOptions' => [
            'placeholder' => 'เลือก tag ...',
            'allowClear' => true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'price')->textInput() ?>
    <?= $form->field($model, 'list')->textInput(['maxlength' => true]) ?>

    <br />
    <?php
    echo DatePicker::widget([
        'model' => $model,
        'form' => $form,
        'attribute' => 'date',
        'options' => ['placeholder' => 'วันที่ทำรายการ ...'],
        'type' => DatePicker::TYPE_COMPONENT_APPEND,
        //'value' => '23-Feb-1982',
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>

    <?php echo $form->field($model, 'status')->dropDownList(Yii::$app->params['expendStat']/*,['onchange' => "changeTag()", 'id' => "stat"]*/); ?>
    
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-danger' : 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
