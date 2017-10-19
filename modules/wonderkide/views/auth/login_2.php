<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<section class="login_content">
    <?php $form = ActiveForm::begin(); ?>
    
                <h1>Login Form</h1>
                <div>
                    <?php echo $form->field($model,'username')->textInput(['class'=>'form-control', 'placeholder'=>'Username'])->label(false); ?>
                    <?php //echo $form->error($model,'username'); ?>
                </div>
                <div>
                    <?php echo $form->field($model,'password')->passwordInput(['class'=>'form-control', 'placeholder'=>'password'])->label(false); ?>
                    <?php //echo $form->error($model,'password'); ?>
                </div>
                <div>
                    <?php echo $form->field($model,'rememberMe')->checkbox(); ?>
                    <?php //echo $form->label($model,'rememberMe'); ?>
                    <?php //echo $form->error($model,'rememberMe'); ?>
                </div>
                <div>
                
                    <?php //echo CHtml::submitButton('Log in',array('class'=>'btn btn-default submit')); ?>
                    <?= Html::submitButton('Log in', ['class' => 'btn btn-default submit']) ?>
                </div>

                <div class="clearfix"></div>

                <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                    <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                    <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
                </div>
    <?php ActiveForm::end(); ?>
</section>