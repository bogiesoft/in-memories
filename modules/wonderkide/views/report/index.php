<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\UserModel;

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

$this->title = 'Report';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p class="pull-left">
        <div class="squaredTwo pull-left">
            <input type="checkbox" value="<?= $active==1 ? 1:-1 ?>" id="squaredTwo" name="check" <?= $active==1 ? "checked":"" ?> />
            <label title="การตรวจสอบ" for="squaredTwo"></label>
            <p class="label">เลือกเฉพาะที่ยังไม่ตรวจสอบ</p>
        </div>
    
        <div class="clearfix"></div>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            //'id_user',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'id_user',
                        'format' => 'text',
                        'value' => function ($data) {
                            return UserModel::getUsername($data->id_user);
                        },
            ],
            //'id_user_report',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'id_user_report',
                        'format' => 'text',
                        'value' => function ($data) {
                            return UserModel::getUsername($data->id_user_report);
                        },
            ],
            'id_cat',
            'category',
            // 'title',
            // 'content',
            'create_time:datetime',
            //'active',
            [
                        'class' => 'yii\grid\DataColumn',
                        'attribute' => 'active',
                        'format' => 'text',
                        'value' => function ($data) {
                            return Yii::$app->params['show'][$data->active];
                        },
            ],

            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{active} {punish} {update}',
                        'buttons' => [
                            'active' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-ok"></span>', null,['class'=>'active-like cursor-pointer', 'location'=>'/wonderkide/report/createlog/' . $model->id, 'title'=>'อนุมัติ']);
                            },
                            'punish' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-remove"></span>', null,['class'=>'punish-like cursor-pointer', 'location'=>'/wonderkide/report/punishlog/' . $model->id, 'title'=>'ไม่อนุมัติ']);
                            }
                        ]
            ],
        ],
    ]); ?>
</div>

<?php
$js = <<< JS
$('#squaredTwo').change(function()
{
    console.log($(this).val());
    var data = $(this).val();
    if(data == -1){
                data = 1;
            }
            else{
                data = -1;
            }
    window.location = "/wonderkide/report?active="+data;
});
$('.active-like').click( function (e) {
    var url = $(this).attr('location');
    krajeeDialogCustConfirm.confirm("ต้องการอนุมัติและให้ค่าประสบการณ์ใช่ไหม", function (result) {
        if (result) {
            window.location = url;
        }
    });
});
$('.punish-like').click( function (e) {
    var url = $(this).attr('location');
    krajeeDialogCustConfirm.confirm("ทำเครื่องหมายว่าตรวจสอบแล้ว และลงโทษลดค่าประสบการณ์ผู้รายงาน", function (result) {
        if (result) {
            window.location = url;
        }
    });
});
JS;
 
// register your javascript
$this->registerJs($js);

?>