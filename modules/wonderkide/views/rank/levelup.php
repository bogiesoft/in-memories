<?php
use app\models\RankModel;
use kartik\dialog\Dialog;

echo Dialog::widget([
    
    'libName' => 'krajeeDialogCustConfirm', // a custom lib name
    'options' => [  // customized BootstrapDialog options
        'size' => Dialog::SIZE_SMALL, // large dialog text
        'type' => Dialog::TYPE_DANGER, // bootstrap contextual color
        'title' => 'ดำเนินการ',
        'btnOKClass' => 'btn-danger',
        'btnOKLabel' => '<i class="glyphicon glyphicon-ok"></i> ใช่',
        'btnCancelLabel' => '<i class="glyphicon glyphicon-ban-circle"></i> ไม่',
    ]
    
]);
?>
<section class="lv-up">
    <h4>ตรวจสอบการเลื่อนยศ :: ผู้ใช้ที่สามารถเลื่อนยศได้</h4>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th><?= $model[0]->getAttributeLabel('username'); ?></th>
                <th><?= $model[0]->getAttributeLabel('id_rank'); ?></th>
                <th><?= $model[0]->getAttributeLabel('exp'); ?></th>
                <th>ยศถัดไป</th>
                <th>ค่าประสบการณ์ยศถัดไป</th>
                <th></th>
            </tr>
            
        </thead>
        <tbody>
            <?php
            foreach ($model as $key => $row) {
                $rank = RankModel::checkUpRank($row->id_rank, $row->exp);
                if($rank){
            ?>
            <tr>
                <td><?= $key+1 ?></td>
                <td><?= $row->username ?></td>
                <td><?= RankModel::getName($row->id_rank) ?></td>
                <td><?= $row->exp ?></td>
                <td><?= isset($rank)?$rank->name:'*' ?></td>
                <td><?= isset($rank)?$rank->exp:'*' ?></td>
                <td><?php if(isset($rank)){ ?>
                    <a class="rank-up" location="/wonderkide/rank/upgrade?u=<?= $row->id ?>&r=<?= $rank->id ?>" u-name="<?= $row->username ?>" title="เลื่อนยศ" aria-label="Update"><span class="fa fa-level-up fa-lg"></span></a>
                <?php }
                    ?>
                </td>
            </tr>
                <?php }} ?>
        </tbody>
    </table>
</section>

<?php
$js = <<< JS
$('.rank-up').click( function (e) {
    var url = $(this).attr('location');
    var name = $(this).attr('u-name');
    krajeeDialogCustConfirm.confirm("คุณต้องการเลื่อนยศให้กับ "+name+" ใช่ไหม?", function (result) {
        if (result) {
            window.location = url;
        }
    });
});
JS;
 
// register your javascript
$this->registerJs($js);

?>