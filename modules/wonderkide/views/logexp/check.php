<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
use yii\widgets\ActiveForm;
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

// With Range
$date_range = <<< HTML
        <label>ช่วงเวลา</label>
    <div class="input-group">
        <label class="input-group-addon">เริ่ม</label>
        {input1}
    </div>
    <br>
    <div class="input-group">
        <label class="input-group-addon">ถึง</label>
        {input2}
    </div>

HTML;

?>


<?php $form = ActiveForm::begin(['id' => 'expend-filter']); ?>
                        <div class="row">
                            <div class="col-md-3">
                                <?php 

                                echo DatePicker::widget([
                                    'id' => 'expend-date-range',
                                    'type' => DatePicker::TYPE_RANGE,
                                    'name' => 'date_range_from',
                                    'value' => $date_from,
                                    'name2' => 'date_range_to',
                                    'value2' => $date_to,
                                    'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
                                    'layout' => $date_range,
                                    'pluginOptions' => [
                                        'autoclose' => true,
                                        'format' => 'yyyy-mm-dd'
                                    ]
                                ]);  ?>
                                <br>
                                <label class="text-danger">***เลือกช่วงเวลาแล้วกด "ค้นหา"</label>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">ข้อมูลที่ตรวจสอบ</label>

                                <?php 
                                foreach ($category_all as $row) { ?>
                                    <div class="squaredThree-<?= $row ?>">
                                        <input class="data-filter" type="checkbox" value="<?= $row ?>" id="squaredThree-<?= $row ?>" name="category[]" <?= in_array($row,$category) ? "checked":"" ?> />
                                        <label class="alert-checked" data-selected="" for="squaredThree-<?= $row ?>"></label>
                                        <p class="label"><?= $row ?></p>
                                    </div>

                                <?php } ?>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">ไอดีผู้ใช้งาน ***ไอดีเท่านั้น***</label>
                                <input type="text" class="form-control" name="user" placeholder="ID user" value="<?= $user ?>">
                                <br>
                                <label class="text-danger">***ถ้าต้องการค้นหาทั้งหมดไม่ต้องใส่</label>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center marT30">
                                <?php echo Html::submitButton('กรองข้อมูล', ['class' => 'btn btn-default', /*'onclick' => 'confirmOdds('.json_encode($_POST).')'*/]); ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
<br>
<br>
<section class="data-exp-filter">
    <p>
        <?php $implode_cat = implode(':', $category) ?>
        <?php echo Html::a('อนุมัติทั้งหมด', ['active?from='.$date_from.'&to='.$date_to.'&category='.$implode_cat.'&user='.$user], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'id_user',
            //'id_admin',
            'id_cat',
            'category',
            'detail',
            'exp',
            'create_time',
            //'active',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{active} {re_exp}',
                'buttons' => [
                            'active' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-ok"></span>', null,['class'=>'active-exp cursor-pointer', 'location'=>'/wonderkide/logexp/upexp/' . $model->id]);
                            },
                            're_exp' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-remove"></span>', null,['class'=>'non-exp cursor-pointer', 'location'=>'/wonderkide/logexp/nonexp/' . $model->id]);
                            },
                        ]
            ],
        ],
    ]); ?>
</section>
<?php
$js = <<< JS
$('.active-exp').click( function (e) {
    var url = $(this).attr('location');
    krajeeDialogCustConfirm.confirm("ต้องการอนุมัติค่าประสบการณ์ นี้ ใช่ไหม?", function (result) {
        if (result) {
            window.location = url;
        }
    });
});
$('.non-exp').click( function (e) {
    var url = $(this).attr('location');
    krajeeDialogCustConfirm.confirm("คุณไม่ต้องการอนุมัติค่าประสบการณ์นี้ใช่ไหม?", function (result) {
        if (result) {
            window.location = url;
        }
    });
});
JS;
 
// register your javascript
$this->registerJs($js);

?>