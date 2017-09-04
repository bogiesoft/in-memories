<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use kartik\widgets\SwitchInput
?>
<div class="photo-library-form">

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'id'=>'manage-gallery-form']); ?>

    <?=$form->errorSummary($model) ?>
    <?= $form->field($model, 'ref')->hiddenInput(['maxlength' => 50])->label(false); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => 128]) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => 256]) ?>
    <?= $form->field($model, 'detail')->textarea(['rows' => 3]) ?>
    <?php //echo $form->field($model, 'show')->dropDownList(Yii::$app->params['show']); ?>

    <?php echo $form->field($model, 'show')->widget(SwitchInput::classname(), []); ?>

    <div class="form-group">
        <?php
        if($model->isNewRecord){
            echo Html::submitButton('เพิ่ม', ['class' => 'btn btn-danger btn-lg btn-block']);
        }else{
            echo Html::submitButton('แก้ไข', ['class' => 'btn btn-danger btn-lg btn-block']);
        }
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>