<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\widgets\updateZeny;
use app\components\helpFunction;
use yii\widgets\ActiveForm;

if($modelUser){
    
?>
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'personal']); ?>
    <div class="col-md-4">
        <?= $this->render('_menu') ?>
        <?php /*
        if(!Yii::$app->user->isGuest){ ?>
        <section class="profile">
            <h3 class="text-center">Member group : <small><?= Yii::$app->params['groupMember'][$modelUser->permission] ?></small></h3>
                <div class="user-image">
                    <?= Html::img(Yii::$app->user->identity->image == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':'/uploads/img/profile/'.Yii::$app->user->identity->image, ['class' => 'img-responsive','id' => 'show-profile-img']) ?>
                </div>
                <div class="user-image-button">
                    <?= Html::a('อัพโหลดรูป', ['#'], ['class' => 'btn btn-default btn-xs','data-toggle' => 'modal','data-target' => '#ProfileImg','id' => 'modal-user-img']) ?>
                </div>
            
        </section>
        <?php } */?>
        <section id="update-zeny">
            <?= updateZeny::widget(); ?>
        </section>
    </div>
    <div class="col-md-8">
        <section id="show-profile" class="profile-detail">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Personal information</h3>
                </div>
                <div class="panel-body">
                    <!--<div class="user-image">
                        <?= Html::a(Html::img(Yii::$app->user->identity->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png': Yii::$app->user->identity->image_crop, ['class' => 'img-responsive show-profile-img','id' => 'profile-img-detail']), Url::to('/personal/photo')) ?>
                    </div>-->
                    <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('username'); ?> :</th>
                            <td><?= $modelUser->username ?></td>
                        </tr>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('email'); ?> :</th>
                            <td><?= $modelUser->email ?></td>
                        </tr>
                        <?php if($permission){ ?>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('nickname'); ?> :</th>
                            <td><?= $modelUser->nickname ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('created_at'); ?> :</th>
                            <td><?= helpFunction::dateTime(date('Y-m-d H:i:s',$modelUser->created_at)) ?></td>
                        </tr>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('updated_at'); ?> :</th>
                            <td><?= helpFunction::dateTime(date('Y-m-d H:i:s',$modelUser->updated_at)) ?></td>
                        </tr>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('id_rank'); ?> :</th>
                            <td><?= $rank->name ?> :: <?= $rank->name_th ?></td>
                        </tr>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('exp'); ?> :</th>
                            <td><?= $modelUser->exp ?></td>
                        </tr>
                    </table>
                    </div>
                    <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                    <?= Html::button('แก้ไขข้อมูล', ['class' => 'btn btn-danger btn-sm pull-right']) ?>
                </div>
            </div>
        </section>
        <section id="edit-profile" class="profile-detail">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Personal information</h3>
                </div>
                <div class="panel-body">
                    <!--<div class="user-image">
                        <?= Html::a(Html::img(Yii::$app->user->identity->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png': Yii::$app->user->identity->image_crop, ['class' => 'img-responsive show-profile-img','id' => 'profile-img-detail']), Url::to('/personal/photo')) ?>
                    </div>-->
                    <?php $form = ActiveForm::begin(['id'=>'editprofile-form']); ?>
                    <table class="table table-striped">
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('username'); ?> :</th>
                            <td><?= $modelUser->username ?></td>
                        </tr>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('email'); ?> :</th>
                            <td><?= $form->field($modelUser, 'email')->textInput(['maxlength' => true])->label(FALSE) ?></td>
                        </tr>
                        <?php if($permission){ ?>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('nickname'); ?> :</th>
                            <td><?= $form->field($modelUser, 'nickname')->textInput(['maxlength' => true])->label(FALSE) ?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('created_at'); ?> :</th>
                            <td><?= helpFunction::dateTime(date('Y-m-d H:i:s',$modelUser->created_at)) ?></td>
                        </tr>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('updated_at'); ?> :</th>
                            <td><?= helpFunction::dateTime(date('Y-m-d H:i:s',$modelUser->updated_at)) ?></td>
                        </tr>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('id_rank'); ?> :</th>
                            <td><?= $rank->name ?> :: <?= $rank->name_th ?></td>
                        </tr>
                        <tr>
                            <th><?= $modelUser->getAttributeLabel('exp'); ?> :</th>
                            <td><?= $modelUser->exp ?></td>
                        </tr>
                    </table>
                    <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                    
                    <div class="form-group">
                        <?= Html::button('ยกเลิก', ['class' => 'btn btn-default btn-sm pull-right', 'id' => 'back-show-profile']) ?>
                        <?= Html::submitButton('แก้ไข', ['class' => 'btn btn-danger btn-sm pull-right marR10', 'id' => 'submit-editprofile']) ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </section>
        
        
    </div>
    
<?php $this->endContent(); ?>

<?php } 
else{
     echo 'WTF';
} 
//if not validate get show edit again
if($modelUser->errors){
    echo '<script>showeditprofile();</script>';
}

?>