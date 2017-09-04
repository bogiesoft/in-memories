<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\models\TagsModel;
use kartik\widgets\TouchSpin;
use kartik\widgets\DatePicker;

$tags = TagsModel::findTags('expend', null);
/*if($model->isNewRecord){
    $actionForm = 'add';
}
else{
    $actionForm = 'update';
}

var_dump($actionForm);*/
?>

<div class="note-model-form">
    
    <?php $form = ActiveForm::begin(); ?>
    
    <?php
    $model->tags = explode(',', $model->tag);
    //var_dump($model->tags);exit();
    //$tagVal = explode(',', $model->tag);
    //$data = Yii::$app->params['noteTag'];
    
    // Without model and implementing a multiple select
    /*echo '<label class="control-label">Tag</label>';
    echo Select2::widget([
        'name' => 'tag',
        'value' => $tagVal, // initial value
        'data' => $tags,
        'options' => [
            'placeholder' => 'Select tag ...',
            'multiple' => true,
            //3 => ['disabled' => true],
        ],
        
    ]);*/
    echo $form->field($model, 'tags')->widget(Select2::classname(), [
        'data' => $tags,
        'options' => ['placeholder' => 'เลือกรายการ ...', 'multiple' => true],
        'pluginOptions' => [
            'placeholder' => 'เลือก tag ...',
            'allowClear' => true,
        ],
    ]);
    ?>

    <?= $form->field($model, 'list')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?php //echo $form->field($model, 'amount')->textInput() ?>
    
    <?php
    // Adjust buttons display and styles
    /*echo '<label class="control-label">Amount</label>';
    echo TouchSpin::widget([
        'model' => $model,
        'attribute' => 'amount',
        //'name' => 't4',
        'pluginOptions' => [
            'initval' => 1,
            'min' => 1,
            'max' => 9999999999,
            'buttonup_class' => 'btn btn-primary', 
            'buttondown_class' => 'btn btn-info', 
            'buttonup_txt' => '<i class="glyphicon glyphicon-plus-sign"></i>', 
            'buttondown_txt' => '<i class="glyphicon glyphicon-minus-sign"></i>'
        ]
    ]);*/
    ?>
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
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
