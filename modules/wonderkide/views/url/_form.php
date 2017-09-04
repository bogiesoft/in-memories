<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UrlModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="url-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'realpath')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'pagetitle')->textarea(['rows' => 1]) ?>

    <?= $form->field($model, 'keywords')->textarea(['rows' => 4]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 4]) ?>

    <?php //echo $form->field($model, 'editable')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>