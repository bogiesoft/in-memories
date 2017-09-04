<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

?>
<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="expend cat-widget">
                    <div class="widget-title">
                        <h4><a href="#">REPORT</a></h4>
                        <span class="sub-title">รายงาน</span>

                        <div class="sep-widget-dou"></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                         <?php if (Yii::$app->session->hasFlash('ReportUser')): ?>
                            <?= \yii\bootstrap\Alert::widget([
                                'body'=>ArrayHelper::getValue(Yii::$app->session->getFlash('ReportUser'), 'body'),
                                'options'=>ArrayHelper::getValue(Yii::$app->session->getFlash('ReportUser'), 'options'),
                            ])?>
                        <?php else: ?>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="report-model-form dark-form">

                                    <?php $form = ActiveForm::begin(); ?>

                                    <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'readonly' => $model->isNewRecord]) ?>

                                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                                    <?= $form->field($model, 'content')->textarea(['rows' => 3]) ?>

                                    <div class="form-group">
                                        <?= Html::submitButton($model->isNewRecord ? 'รายงาน' : 'Update', ['class' => 'button button-small']) ?>
                                    </div>

                                    <?php ActiveForm::end(); ?>

                                </div>
                            </div>
                            <div class="col-lg-7"></div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>