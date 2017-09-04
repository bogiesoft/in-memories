<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\captcha\Captcha;
use app\components\widgets\rules;

?>

        <h2 class="hidden">Sidebar</h2>
                    <section class="widget wdg-tabs" data-showonscroll="true" data-animation="fadeIn">
                    <div class="widget-title clearfix">
                        <h3 class="hidden">Tabs Widget</h3>
                        <div class="sep-widget"></div>
                    </div>

                    <div class="widget-content paddingZero clearfix">
                        <ul class="nav nav-tabs">
                            <li class="<?= $check ? '' : 'active' ?>"><a href="#login" data-toggle="tab">เข้าสู่ระบบ</a></li>
                            <li class="<?= $check ? 'active' : '' ?>"><a href="#regist" data-toggle="tab">สมัครสมาชิก</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">

                            <!--right-tab1-->

                            <aside class="tab-pane animated fadeInDown <?= $check ? '' : 'active' ?>" id="login">
                                <h4 class="hidden">Login - Tab</h4>

                                <?php $form_login = ActiveForm::begin([
                                    'id' => 'login-form',
                                    'options' => ['class' => 'form-horizontal'],
                                    'fieldConfig' => [
                                        'template' => "{label}\n<div>{input}</div>\n<div>{error}</div>",
                                        'labelOptions' => ['class' => 'col-lg-1 control-label'],
                                    ],
                                ]); ?>

                                    <?php //echo $form->field($login, 'username') ?>
                                <?= $form_login->field($login, 'username', [
                                                'template' => "<div class='col-md-4'>{label}</div>\n<div class='col-md-8'>{input}</div><div class='col-md-4'></div><div class='col-md-8'>\n{hint}\n{error}</div>",
                                                'labelOptions' => [ 'class' => 'input-username' ]
                                ])->textInput(['maxlength' => true])?>
                                <?= $form_login->field($login, 'password', [
                                                'template' => "<div class='col-md-4'>{label}</div>\n<div class='col-md-8'>{input}</div><div class='col-md-4'></div><div class='col-md-8'>\n{hint}\n{error}</div>",
                                                'labelOptions' => [ 'class' => 'input-password' ]
                                ])->passwordInput()?>
                                    <?php //echo $form->field($login, 'password')->passwordInput() ?>
                       
                                    
                                    <div class="col-md-6">
                                        <?= $form_login->field($login, 'rememberMe')->checkbox([
                                            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                        ]) ?>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="" style="color:#999;;margin: 5px 15px;">
                                            <strong><a href="<?= Yii::$app->seo->getUrl('site/resetpassword') ?>">ลืมรหัสผ่าน?</a></strong><br>
                                        </div>
                                    </div>
                                    
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-lg-offset-1 col-lg-11">
                                            <?= Html::submitButton('Login', ['class' => 'btn btn-primary center-block', 'name' => 'login-button']) ?>
                                        </div>
                                    </div>
                                </div>
                                

                                <?php ActiveForm::end(); ?>
                            </aside>

                            <!--end right-tab1-->

                            <!--right-tab2-->
                            <aside class="tab-pane animated fadeInDown <?= $check ? 'active' : '' ?>" id="regist">
                                <h4 class="hidden">Regist - Tab</h4>
                                <?php if ($signup_complete): ?>
                                
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <strong>สมัครสมาชิกเรียบร้อย!</strong> คุณสามารถลงชื่อเข้าใช้งานได้แล้วในขณะนี้.
                                    </div>
                                <?php else: ?>
                                <?php $form_signup = ActiveForm::begin(['id' => 'form-signup']); ?>
                                    <?= $form_signup->field($signup, 'username', [
                                                'template' => "<div class='row'><div class='col-md-4'>{label}</div>\n<div class='col-md-8'>{input}</div><div class='col-md-4'></div><div class='col-md-8'>\n{hint}\n{error}</div></div>",
                                                'labelOptions' => [ 'class' => 'input-username' ]
                                    ])->textInput(['maxlength' => true])?>
                                    
                                    <?= $form_signup->field($signup, 'email', [
                                                'template' => "<div class='row'><div class='col-md-4'>{label}</div>\n<div class='col-md-8'>{input}</div><div class='col-md-4'></div><div class='col-md-8'>\n{hint}\n{error}</div></div>",
                                                'labelOptions' => [ 'class' => 'input-username' ]
                                    ])->textInput(['maxlength' => true])?>
                                
                                    <?= $form_signup->field($signup, 'password', [
                                                'template' => "<div class='row'><div class='col-md-4'>{label}</div>\n<div class='col-md-8'>{input}</div><div class='col-md-4'></div><div class='col-md-8'>\n{hint}\n{error}</div></div>",
                                                'labelOptions' => [ 'class' => 'input-password' ]
                                    ])->passwordInput()?>
                                    <?= $form_signup->field($signup, 're_password', [
                                                'template' => "<div class='row'><div class='col-md-4'>{label}</div>\n<div class='col-md-8'>{input}</div><div class='col-md-4'></div><div class='col-md-8'>\n{hint}\n{error}</div></div>",
                                                'labelOptions' => [ 'class' => 'input-password' ]
                                    ])->passwordInput()?>

                                    <?= $form_signup->field($signup, 'verifyCode')->widget(Captcha::className(), [
                                            'template' => '<div class="row"><div class="col-md-5">{image}</div><div class="col-md-7">{input}</div></div>',
                                            //'options' => [ 'class' => 'col-md-5' ]
                                        ]) ?>
                                    <label>*** กรุณาอ่านกฏการใช้งานอย่างละเอียด <a id="rules-modal-button" style="cursor: pointer">ที่นี่</a> ***</label>
                                    <?php echo $form_signup->field($signup, 'agree_rule')->checkBox(['label' => 'ท่านได้ยอมรับกฏและเงื่อนไขทั้งหมดในการใช้งานเว็บไซต์ ', 'uncheck' => null, 'selected' => true]); ?>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary center-block', 'name' => 'signup-button']) ?>
                                    </div>
                                </div>

                                <?php ActiveForm::end(); ?>
                                <?php endif; ?>
                                
                            </aside>
                            <!--end right-tab2-->

                        </div>
                    </div>
                </section>
        <?php echo rules::widget([]); ?>