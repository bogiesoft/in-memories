<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="row">
    <div class="col-md-4">
        <?= $this->render('/layouts/_menu_personal') ?>
    </div>
    <div class="col-md-8">
        <section id="profile-img">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">จัดการรูปโปรไฟล์</h3>
                </div>
                <div class="panel-body">
                    <?php 
                    if(!$upload){ ?>
                    <div class="user-image">
                        <?= Html::img(Yii::$app->user->identity->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png': Yii::$app->user->identity->image_crop, ['class' => 'img-responsive show-profile-img','id' => 'before-profile-img']) ?>
                    </div>
                    <div class="before-upload">
                        <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'profile_crop']]); ?>

                        <?php echo $form->field($model, 'imageFile')->fileInput(['onchange'=>"$('#profile_crop').submit()"]) ?>
                        <?php /*
                        <!--<div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                        </div>-->
                         * 
                         */?>

                        <?php ActiveForm::end(); ?>
                    </div>
                    <?php } 
                    else{ ?>
                    <h3 class="center">คลิ๊กแล้วลากที่รูป เพื่อตัด</h3>
                    <div class="crop-image text-center">
                        <?= Html::img($img, ['class' => 'show-profile-img-crop','id' => 'crop-profile-img']) ?>
                    </div>
                    <div class="image-button">
                            <input type="hidden" name="x1" id="x1" value="" />
                            <input type="hidden" name="y1" id="y1" value="" />
                            <input type="hidden" name="x2" id="x2" value="" />
                            <input type="hidden" name="y2" id="y2" value="" />
                            <input type="hidden" name="mem_id" id="mem_id" value="<?php echo Yii::$app->user->identity->id; ?>" /><br />
                            <!--<input type="button" value="" class="button-crop" onclick="imageCrop()" style="display: none" id="CropButton">-->
                            <?php //echo Html::button('เปลี่ยนรูป', ['class' => 'btn btn-default btn-xs']) ?>
                            <?php echo Html::button('Crop', ['class' => 'btn btn-default btn-sm crop','onclick' => 'imageCrop()']) ?>
                    </div>

                    <?php } ?>
                </div>
            </div>
            
        </section>
    </div>
</div>
