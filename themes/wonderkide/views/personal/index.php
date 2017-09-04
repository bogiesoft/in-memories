<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\widgets\updateZeny;
use app\components\helpFunction;

if($modelUser){
?>
<div class="row">
    <div class="col-md-4">
        <?= $this->render('/layouts/_menu_personal') ?>
        <section id="update-zeny">
            <?= updateZeny::widget(); ?>
        </section>
    </div>
    <div class="col-md-8">
        <section class="profile-detail">
            <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Personal information</h3>
                </div>
                <div class="panel-body">
                    <div class="user-image">
                        <?= Html::img(Yii::$app->user->identity->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png': Yii::$app->user->identity->image_crop, ['class' => 'img-responsive show-profile-img','id' => 'profile-img-detail']) ?>
                    </div>
                    <table class="table table-striped">
                        <tr>
                            <th>Username :</th>
                            <td><?= $modelUser->username ?></td>
                        </tr>
                        <tr>
                            <th>Email :</th>
                            <td><?= $modelUser->email ?></td>
                        </tr>
                        <tr>
                            <th>Create date :</th>
                            <td><?= helpFunction::dateTime(date('Y-m-d H:i:s',$modelUser->created_at)) ?></td>
                        </tr>
                        <tr>
                            <th>Update date :</th>
                            <td><?= helpFunction::dateTime(date('Y-m-d H:i:s',$modelUser->updated_at)) ?></td>
                        </tr>
                        <!--<tr>
                            <th>Rank :</th>
                            <td><?= Yii::$app->params['groupMember'][$modelUser->permission] ?></td>
                        </tr>-->
                        <tr>
                            <th>Rank :</th>
                            <td><?= $rank->name ?> :: <?= $rank->name_th ?></td>
                        </tr>
                    </table>
                    <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                    <?php //echo Html::a('แก้ไขข้อมูล', ['/personal/editprofile'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
                </div>
            </div>
        </section>
        <?php /*
        <?php if($modelZeny){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">ประวัติการใช้ Zeny</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Detail</th>
                            <th>Zeny</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach ($modelZeny as $row) { ?>
                        <tr>
                            <td><?= $row->update_time ?></td>
                            <td><?= $row->text ?></td>
                            <td><?= $row->zeny ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                <?= Html::a('แก้ไขข้อมูล', ['/personal/editprofile'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
            </div>
        </div>
        <?php } ?>
        <?php if($modelGame){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">ประวัติการเล่น Game</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Zeny</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach ($modelGame as $row) { ?>
                        <tr>
                            <td><?= $row->play_date ?></td>
                            <td><?= $row->zeny ?></td>
                            <td><?= $row->status ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                <?= Html::a('แก้ไขข้อมูล', ['/personal/editprofile'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
            </div>
        </div>
        <?php } ?>
         * 
         */ ?>
    </div>
    
</div>

<?php } 
else{
     echo 'WTF';
} ?>