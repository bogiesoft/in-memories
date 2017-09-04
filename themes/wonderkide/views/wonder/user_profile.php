<?php
use yii\helpers\Html;
use app\components\helpFunction;

if($modelUser){
?>
<div class="row">
    <div class="col-md-12">
        <div class="cat-widget">
                <div class="widget-title">
                            <h4><a href="<?= Yii::$app->seo->getUrl('personal') ?>">PERSONAL</a></h4>
                            <span class="sub-title"><?= $modelUser->nickname ? $modelUser->nickname:$modelUser->username ?></span>

                            <div class="sep-widget-dou"></div>
                            <div class="clearfix"></div>
                </div>
            <div class="widget-content">
                <section class="profile-detail">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">Personal information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="user-image">
                                <?= Html::img($modelUser->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png': $modelUser->image_crop, ['class' => 'img-responsive show-profile-img','id' => 'profile-img-detail',]) ?>
                            </div>
                            <table class="table table-striped">
                                <tr>
                                    <th>ชื่อ :</th>
                                    <td><?= $modelUser->username ?></td>
                                </tr>
                                <tr>
                                    <th><?= $modelUser->getAttributeLabel('nickname'); ?> :</th>
                                    <td><?= $modelUser->nickname ?></td>
                                </tr>
                                <tr>
                                    <th><?= $modelUser->getAttributeLabel('created_at'); ?> :</th>
                                    <td><?= helpFunction::dateTime(date('Y-m-d H:i:s',$modelUser->created_at)) ?></td>
                                </tr>
                                <tr>
                                    <th><?= $modelUser->getAttributeLabel('id_rank'); ?> :</th>
                                    <td><?= $rank->name ?> :: <?= $rank->name_th ?></td>
                                </tr>
                                <?php /*
                                <tr>
                                    <th><?= $modelUser->getAttributeLabel('zeny'); ?> :</th>
                                    <td><?= $modelUser->zeny ?></td>
                                </tr>
                                 * 
                                 */ ?>
                            </table>
                            <?php 
                            if($modelUser->id == Yii::$app->user->id){
                                echo Html::a('ข้อมูลส่วนตัว', [Yii::$app->seo->getUrl('personal')], ['class' => 'btn btn-default btn-sm pull-right']);
                            }else{
                            
                                echo Html::a('ส่งข้อความส่วนตัว', [Yii::$app->seo->getUrl('personal/sent').'?to='.$modelUser->id], ['class' => 'btn btn-default btn-sm pull-right']);
                            } ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    
</div>

<?php } 
else{
     echo 'WTF';
} ?>