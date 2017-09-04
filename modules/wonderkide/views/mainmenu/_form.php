<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\MainMenuModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-menu-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'label')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'type')->dropDownList(Yii::$app->params['typeMenu']); ?>

    <?php echo $form->field($model, 'onMobile')->widget(SwitchInput::classname(), []); ?>

    <?php echo $form->field($model, 'active')->widget(SwitchInput::classname(), []); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>