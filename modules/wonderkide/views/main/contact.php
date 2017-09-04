<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="site-contact">
    <h1>ข้อมูลการติดต่อ</h1>


                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'phone_1') ?>
                    <?= $form->field($model, 'phone_2') ?>

                    <?= $form->field($model, 'address')->textArea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
</div>
