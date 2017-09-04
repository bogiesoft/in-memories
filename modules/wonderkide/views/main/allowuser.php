<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<section class="manage-icon">
    <h2>จัดการ Username, Nickname ที่ห้ามใช้</h2>

    <div class="travel-model-form">

        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'content')->textarea() ?>
        <label class="text-danger">ใช้เครื่องหมาย , สำหรับแบ่งคำ</label>
        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
        

        <?php ActiveForm::end(); ?>

    </div>
</section>