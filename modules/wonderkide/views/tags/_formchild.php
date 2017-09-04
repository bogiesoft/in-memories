<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TagsModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tags-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_en')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'category')->textInput(['maxlength' => true]) ?>
    
    <?php echo $form->field($model, 'category')->dropDownList(Yii::$app->params['tagCat']); ?>

    <?php //echo $form->field($model, 'group')->textInput() ?>
    
    <?php echo $form->field($model, 'group')->dropDownList(Yii::$app->params['tagGroup']); ?>

    <?php //echo $form->field($model, 'parent_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>