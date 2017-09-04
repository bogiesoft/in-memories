<?php 
//use app\components\helpFunction;
use app\components\widgets\Honor;
use yii\helpers\Html;
if($model) { ?>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Pic</th>
                <th>User</th>
                <th>Play</th>
                <th><?= $status ?></th>
            </tr>
            <?php $i=1;
            foreach ($model as $row) { 
                $played = Honor::checkPlayed($row->id_user);
                //var_dump($played);exit();
                $user = Honor::getUser($row->id_user);
            ?>
            
                <tr>
                    <td class=""><?= $i ?></td>
                    <td class=""><?= Html::img($user->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png': $user->image_crop, ['class' => 'img-responsive thumb-img']) ?></td>
                    <td><?= $user->username ?></td>
                    <td class=""><?= $played->count ?></td>
                    <td><?= $row->count ?></td>
                </tr>
            <?php 
                $i++;
            } ?>
                
        </table>
<?php }
else{ ?>
<div class="no-content">ไม่มีข้อมูล</div>
<?php } ?>