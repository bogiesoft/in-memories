<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>
<div class="row">
    <div class="col-md-4">
        <?= $this->render('/layouts/_menu_personal') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">เปลี่ยน Password</h3>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(['id' => 'form-reset-password']); ?>

                        <?= $form->field($model, 'old_password')->passwordInput() ?>

                        <?= $form->field($model, 'new_password')->passwordInput() ?>

                        <?= $form->field($model, 're_password')->passwordInput() ?>


                        <div class="form-group">
                            <?= Html::submitButton('Reset', ['class' => 'btn btn-info']) ?>
                        </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>

