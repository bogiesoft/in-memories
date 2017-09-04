<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\components\widgets\updateZeny;
use app\components\helpFunction;

?>
<div class="row">
    <div class="col-md-4">
        <?= $this->render('/layouts/_menu_personal') ?>
        <section id="update-zeny">
            <?= updateZeny::widget(); ?>
        </section>
    </div>
    <div class="col-md-8">
        
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
                        <tr class="<?php if($row->status == 1){echo 'success';}if($row->status == -1){echo 'danger';}if($row->status == 0){echo 'warning';} ?>">
                            <td><?= $row->update_time ?></td>
                            <td><?= $row->text ?></td>
                            <td><?= $row->zeny ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <p>สรุปยอดเงินในบัญชี : <span><?= Yii::$app->user->identity->zeny ?></span></p>
                <p>หนี้สิน : <span>xxxx</span></p>
                <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                <div class="zeny-button">
                    <?= Html::a('ขอกู้เงิน', ['/personal/loan'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
                    <div style="width:1000px;"></div>
                    <?= Html::a('โอนเงิน', ['/personal/transfer'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <?php if($modelLoan){ ?>
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">ประวัติการกู้ยืม Zeny</h3>
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>From</th>
                            <th>Zeny</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach ($modelLoan as $row) { ?>
                        <tr class="<?php if($row->status == 1){echo 'success';}if($row->status == -1){echo 'danger';}if($row->status == 0){echo 'warning';} ?>">
                            <td><?= $row->update_time ?></td>
                            <td><?= $row->text ?></td>
                            <td><?= $row->zeny ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                <p>สรุปยอดเงินในบัญชี : <span><?= Yii::$app->user->identity->zeny ?></span></p>
                <p>หนี้สิน : <span>xxxx</span></p>
                <?php //echo Html::a('ข้อมูลส่วนตัว', ['/site/personal'], ['class' => 'btn btn-primary btn-sm pull-left']) ?>
                <div class="zeny-button">
                    <?= Html::a('ขอกู้เงิน', ['/personal/loan'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
                    <div style="width:1000px;"></div>
                    <?= Html::a('โอนเงิน', ['/personal/transfer'], ['class' => 'btn btn-warning btn-sm pull-right']) ?>
                </div>
            </div>
        </div>
        <?php } ?>
        
        
    </div>
    
</div>
