<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

//$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">

    <p class="text-danger">***แก้ไขรหัสผ่าน***</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>


                <?php //echo $form->field($model, 'password') ?>

                <?= $form->field($model, 'new_password')->passwordInput() ?>
            
                <?= $form->field($model, 're_password')->passwordInput() ?>
            

                <div class="form-group">
                    <?= Html::submitButton('Reset', ['class' => 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
