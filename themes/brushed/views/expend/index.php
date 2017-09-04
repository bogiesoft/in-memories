<?php
use yii\helpers\Html;
use yii\grid\GridView;
use kartik\widgets\DatePicker;
use yii\widgets\ActiveForm;
use kartik\widgets\RangeInput;
//var_dump($dataProvider->getTotalCount());
//var_dump($dataProvider->models);

//get result
$in = 0;
$out = 0;
$total = 0;
foreach ($dataProvider->models as $row) {
    if($row->status == 1){
        $in += $row->price;
    }
    else{
        $out -= $row->price; 
    }
}

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
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'personal']); ?>
    <div class="col-md-4">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-8">

                <div class="panel panel-default">
                    <div class="panel-heading">
                      <h3 class="panel-title">ตัวกรอง</h3>
                    </div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin(['action' => '/expend', 'id' => 'expend-filter']); ?>
                        <div class="row">
                            <div class="col-md-6">
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
                                <!--<label class="text-danger">***เลือกช่วงเวลาแล้วกด "ค้นหา"</label>-->
                            </div>
                            <div class="col-md-6">
                                <label>รายการ</label>
                                <?php
                                if($tagModel){ 
                                    foreach ($tagModel as $row) {
                                ?>
                                <div class="squaredThree-<?= $row['from'].$row['id'] ?>">
                                    <input class="tag-filter" type="checkbox" value="<?= $row['name'] ?>" id="squaredThree-<?= $row['from'].$row['id'] ?>" name="tags[]" <?= in_array($row['name'], $tags) ? "checked":"" ?> />
                                    <label class="alert-checked" data-selected="<?= $row['from'].$row['id'] ?>" for="squaredThree-<?= $row['from'].$row['id'] ?>"></label>
                                    <p class="label"><?= $row['name'] ?></p>
                                </div>
                                <?php 
                                    }
                                } ?>
                            </div>
                            <div class="col-md-6">
                                <?php
                                echo '<label class="control-label">ราคาต่ำสุด</label>';
                                echo RangeInput::widget([
                                    'name' => 'min_price',
                                    'value' => $min_price,
                                    'width' => '60%',
                                    'html5Options' => ['min' => 0, 'max' => 50000],
                                    'options' => ['placeholder' => 'Set...', 'class'=>'text-center'],
                                    'addon' => ['append' => ['content' => '฿']]
                                ]);
                                ?>
                                <br>
                                <?php
                                echo '<label class="control-label">ราคาสูงสุด</label>';
                                echo RangeInput::widget([
                                    'name' => 'max_price',
                                    'value' => $max_price,
                                    'width' => '60%',
                                    'html5Options' => ['min' => 0, 'max' => 50000],
                                    'options' => ['placeholder' => 'Set...', 'class'=>'text-center'],
                                    'addon' => ['append' => ['content' => '฿']]
                                ]);
                                ?>
                                <br>
                                <!--<label class="text-danger">***สามารถพิมพ์ช่วงราคาได้ตามต้องการ</label>-->
                            </div>
                            <div class="col-md-6">
                                <label class="control-label">การทำรายการ</label>
                                <div class="squaredThree-income">
                                    <input class="tag-filter" type="checkbox" value="1" id="squaredThree-income" name="expend-status[]" <?= in_array("1", $status) ? "checked":"" ?> />
                                    <label class="alert-checked" data-selected="1" for="squaredThree-income"></label>
                                    <p class="label">รายรับ</p>
                                </div>
                                <div class="squaredThree-outcome">
                                    <input class="tag-filter" type="checkbox" value="-1" id="squaredThree-outcome" name="expend-status[]" <?= in_array("-1", $status) ? "checked":"" ?> />
                                    <label class="alert-checked" data-selected="-1" for="squaredThree-outcome"></label>
                                    <p class="label">รายจ่าย</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="text-center marT30">
                                <?php echo Html::submitButton('กรองข้อมูล', ['class' => 'btn btn-default', /*'onclick' => 'confirmOdds('.json_encode($_POST).')'*/]); ?>
                                </div>
                            </div>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">รายการรายรับ-รายจ่าย</h3>
                    </div>
                    <div class="panel-body">
                        <div class="note-model-index">
                        <p>
                            <?php //echo Html::a('เพิ่ม', ['create'], ['class' => 'btn btn-default']) ?>
                            <?php //echo Html::a('<i class="fa fa-pencil-square-o" aria-hidden="true"></i> จัดการข้อมูล', ['/expend/manage'], ['class' => 'btn btn-info']) ?>
                        </p>

                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            //'filterModel' => $searchModel,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                /*[
                                            'class' => 'yii\grid\DataColumn',
                                            'attribute' => 'tag',
                                            'format' => 'text',
                                            'value' => function ($data) {
                                                return TagsModel::getTagName($data->tag);
                                            },
                                ],*/
                                'tag',
                                'price',
                                //'list',
                                //[ 'attribute' => 'Date', 'format' => 'date', 'value' => function($data){return $data->date;}],
                                [
                                            'class' => 'yii\grid\DataColumn',
                                            'attribute' => 'date',
                                            'format' => 'date',
                                            'value' => function ($data) {
                                                return $data->date;
                                            },
                                ],
                                //'status',
                                //[ 'attribute' => 'Status', 'format' => 'raw', 'value' => function($data){$data->status == 1 ? $stat = 'in come':$stat = 'out come'; return $stat;}],
                                [
                                            'class' => 'yii\grid\DataColumn',
                                            'attribute' => 'status',
                                            'format' => 'text',
                                            'value' => function ($data) {
                                                return Yii::$app->params['in-out'][$data->status];
                                            },
                                ],
                                //['class' => 'yii\grid\ActionColumn'],
                                //[ 'attribute' => 'Overall', 'format' => 'raw', 'value' => function($data){return $data->price*$data->amount;}],
                                ['class' => 'yii\grid\ActionColumn',
                                            'template' => '{update}{delete}',
                                            /*'buttons' => [
                                                'update' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/wonder/editnote/' . $model->id_note);
                                                },
                                                'delete' => function ($url, $model) {
                                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', '/wonder/deletenote/' . $model->id_note);
                                                },
                                            ]*/
                                ],
                            ],
                        ]); ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">สรุป</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">จำนวนรายการ</th>
                                    <th class="text-center">ยอดรายรับ</th>
                                    <th class="text-center">ยอดรายจ่าย</th>
                                    <th class="text-center">ยอดรวม</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center"><?= $dataProvider->getTotalCount() ?></td>
                                    <td class="text-center"><?= $in ?></td>
                                    <td class="text-center"><?= $out ?></td>
                                    <td class="text-center <?= $in+$out >= 0 ? "success":"danger" ?>"><?= $in+$out ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

        
    </div>
<?php $this->endContent(); ?>

<script>
    /*$('#expend-date-rang').change(function()
    {
        $('#expend-filter').submit();
    });*/
    
    $('.tag-filter').change(function()
    {
        $('#expend-filter').submit();
    });
</script>