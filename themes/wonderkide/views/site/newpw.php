<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'Reset Password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <?php if (Yii::$app->session->hasFlash('updatepw')): ?>
    <h2>เรียบร้อย</h2>
        <?= \yii\bootstrap\Alert::widget([
            'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('updatepw'), 'body'),
            'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('updatepw'), 'options'),
        ])?>
    <div style="color:#999;">
        เข้าสู้หน้า <strong><a href="/site/login">Login</a></strong><br>
    </div>
    <?php else: ?>

    <p>กรุณากรอก Password ใหม่ของท่าน</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-reset-pass']); ?>

                <?= $form->field($model, 'new_password')->passwordInput() ?>
            
                <?= $form->field($model, 're_password')->passwordInput() ?>
            

                <div class="form-group">
                    <?= Html::submitButton('Reset', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php endif; ?>
</div>
