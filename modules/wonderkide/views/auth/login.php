<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<section class="container-fluid bg_blue_blackblue">
    <div class="col-sm-5 col-md-4 col-lg-3 login-box">
        <h1>เข้าสู่ระบบ</h1>
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'username')->textInput(['autocomplete' => 'off']) ?>
        <?= $form->field($model, 'password')->passwordInput(['autocomplete' => 'off']) ?>
        <div class="form-group">
            <?= Html::submitButton('Login', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>