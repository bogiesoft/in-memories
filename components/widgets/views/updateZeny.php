<?php 
use yii\helpers\Html;
use app\components\helpFunction;
if($income) { ?>

<div class="panel panel-default">
  <div class="panel-heading">
      <h3 class="panel-title">คุณมีเงินที่ยังไม่ได้รับ !</h3>
  </div>
  <div class="panel-body">
        <table class="table table-hover">
            <tr>
                <th>รายละเอียด</th>
                <th>จำนวนเงิน</th>
                <th>วันที่</th>
                <th></th>
            </tr>
            <?php foreach ($income as $value) { 
            ?>
            
                <tr>
                    <td class="description-income"><?= $value->text ?></td>
                    <td class="zeny-income"><?= $value->zeny ?> zeny</td>
                    <td class="date-income hidden-xs"><?= helpFunction::datetime($value->update_time) ?></td>
                    <td class="action-income"><?= Html::button('รับเงิน', ['class' => 'btn btn-success btn-xs', 'onclick' =>"updateZeny($value->id_log_zeny)"]) ?></td>
                </tr>
            <?php } ?>
                
        </table>
  </div>
</div>

<?php } ?>