<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\components\widgets\rules;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    
    <?php if (Yii::$app->session->hasFlash('signupActivate')): ?>
    <h2>เรียบร้อย</h2>
        <?= \yii\bootstrap\Alert::widget([
            'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('signupActivate'), 'body'),
            'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('signupActivate'), 'options'),
        ])?>
    <?php else: ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
            
                <?= $form->field($model, 're_password')->passwordInput() ?>
            
                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                        'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                    ]) ?>
                <label>*** กรุณาอ่านกฏการใช้งานอย่างละเอียด <a id="rules-modal-button" style="cursor: pointer">ที่นี่</a> ***</label>
                <?php echo $form->field($model, 'agree_rule')->checkBox(['label' => 'ท่านได้ยอมรับกฏและเงื่อนไขทั้งหมดในการใช้งานเว็บไซต์ ', 'uncheck' => null, 'selected' => true]); ?>
            
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<?php echo rules::widget([]); ?>