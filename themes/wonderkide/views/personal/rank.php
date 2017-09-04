<?php
use app\components\widgets\updateZeny;
use app\components\helpFunction;
use app\models\RankModel;
use yii\bootstrap\Modal;
?>
<div class="row">
    <div class="col-md-4">
        <?= $this->render('/layouts/_menu_personal') ?>
        <section id="update-zeny">
            <?= updateZeny::widget(); ?>
        </section>
    </div>
    <div class="col-md-8">
        
        
        <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">ประวัติการเลื่อนขั้น :: Rank</h3>
            </div>
            <div class="panel-body">
                <?php if($log){ ?>
                <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ยศเดิม</th>
                            <th>ยศใหม่</th>
                            <th>เมื่อ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php                        
                        foreach ($log as $key => $row) {
                        ?>
                        <tr class="<?= $row->id == $position ? 'active':'' ?>">
                            <td><?= $key+1 ?></td>
                            <td><?= RankModel::getName($row->rank) ?></td>
                            <td><?= RankModel::getName($row->rank_up) ?></td>
                            <td><?= helpFunction::dateTime($row->create_date) ?></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
                </div>
                <?php }else { ?>
                <h4>ยังไม่มีข้อมูล</h4>
                <?php } ?>
                <p><strong>ศึกษาข้อมูลการเลื่อน Rank ได้ 
                        <a class="cursor-pointer" id="rank-modal-button"> ที่นี่</a></strong></p>
            </div>
        </div>
        
        
    </div>
    
</div>
<?php
Modal::begin([
    'header' => '<h3>'.$model->name.'</h3>',
    'id' => 'rank-modal',
    'size' => Modal::SIZE_LARGE,
    //'toggleButton' => ['label' => 'Close'],
]);

echo $model->content;

Modal::end();

$js = <<< JS
$('#rank-modal-button').click( function (e) {
    $('#rank-modal').modal('show');
});

JS;
 
// register your javascript
$this->registerJs($js);