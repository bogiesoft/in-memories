<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\UserAuth;
$user = app\models\UserModel::findOne(Yii::$app->user->id);
$allow = FALSE;
if(UserAuth::PERMISSION_DEVIL == $user->permission){
    $allow = true;
}

?>

<div class="rank-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'name_th')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'exp')->textInput(['maxlength' => true, 'readonly' => $allow ? FALSE:true]) ?>

    <?= $form->field($model, 'icon')->textInput(['maxlength' => true]) ?>
    
    <?php 
    if($allow){
        echo $form->field($model, 'permission')->dropDownList(Yii::$app->params['permission']); 
    }else{
        echo $form->field($model, 'permission')->textInput(['maxlength' => true, 'readonly' => true]);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>