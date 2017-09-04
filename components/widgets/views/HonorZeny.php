<?php 
use app\components\helpFunction;
use yii\helpers\Html;
use app\components\widgets\Honor;
if($model) { ?>
        <table class="table table-striped">
            <tr>
                <th>No</th>
                <th>Pic</th>
                <th>User</th>
                <th>Zeny</th>
                <th>Date</th>
            </tr>
            <?php $i=1;
            foreach ($model as $row) { 
                //$team = app\components\widgets\Ticket::getTeam($value->id_match);
                $user = Honor::getUser($row->id_user);
            ?>
            
                <tr>
                    <td class=""><?= $i ?></td>
                    <td class=""><?= Html::img($user->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png': $user->image_crop, ['class' => 'img-responsive thumb-img']) ?></td>
                    <td><?= $user->username ?></td>
                    <td class=""><?= $row->zeny ?></td>
                    <td><?= helpFunction::dateTime($row->update_time) ?></td>
                </tr>
            <?php 
                $i++;
            } ?>
                
        </table>
<?php }
else{ ?>
<div class="no-content">ไม่มีข้อมูล</div>
<?php } ?>