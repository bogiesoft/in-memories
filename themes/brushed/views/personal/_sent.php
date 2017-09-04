<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\web\JsExpression;
use app\models\UserModel;
$url = \yii\helpers\Url::to(['/personal/findusername']);
?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'message']); ?>
    <div class="col-md-4">
        <?= $this->render('_menu_pm') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Personal Message :: Sent</h3>
            </div>
            <div class="panel-body">
                <div class="personal-messages-model-form">

                    <?php $form = ActiveForm::begin(); ?>
                    
                    <?php
                    echo $form->field($model, 'id_user_to')->widget(Select2::classname(), [
                        'initValueText' => $username,
                        'options' => ['placeholder' => 'ค้นหา ...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'minimumInputLength' => 3,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Waiting for results...'; }"),
                        ],
                        'ajax' => [
                            'url' => $url,
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term}; }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                    ],
                    ]);
                    ?>

                    <?php //echo $form->field($model, 'username')->textInput() ?>

                    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'detail')->textarea(['rows' => 6]) ?>

                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'ส่ง' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-danger' : 'btn btn-danger']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>