<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <section id="profile-img">
                    <div class="user-image">
                        <?= Html::img(Yii::$app->user->identity->image == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':'/uploads/img/profile/'.Yii::$app->user->identity->image, ['class' => 'img-responsive','id' => 'show-profile-img']) ?>
                    </div>
                    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
                        <div class="form-group">
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </section>
            </div>
        </div>
    </div>
</div>