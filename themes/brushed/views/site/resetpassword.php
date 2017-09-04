<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;

$this->title = 'ลืมรหัสผ่าน';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-resetpw">

                    <?php if (Yii::$app->session->hasFlash('resetpw')): ?>
                    <h2>เรียบร้อย</h2>
                        <?= \yii\bootstrap\Alert::widget([
                            'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('resetpw'), 'body'),
                            'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('resetpw'), 'options'),
                        ])?>
                    <?php else: ?>

                    <h1><?= Html::encode($this->title) ?></h1>
                    <p>กรุณากรอกข้อมูล Username หรือ Email ที่ใช้ในการลงทะเบียน</p>


                    <div class="row">
                        <div class="col-lg-5">
                            <?php $form = ActiveForm::begin(['id' => 'form-resetpw']); ?>

                                <?= $form->field($model, 'username') ?>

                                <?= $form->field($model, 'has_error', ['template' => "{error}\n{label}\n{hint}\n"])->label(false) ?> 

                                <div class="form-group">
                                    <?= Html::submitButton('ยืนยัน', ['class' => 'btn btn-primary', 'name' => 'resetpw-button']) ?>
                                </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
