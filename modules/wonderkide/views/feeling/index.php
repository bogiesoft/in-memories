<?php

use yii\helpers\Html;
use yii\grid\GridView;

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

$this->title = 'Feeling Comment';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feeling-comment-model-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('อนุมัติทั้งหมด', ['active'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'id_user_owner',
            'id_comment',
            'value',
            // 'detail',
            'create_time:datetime',
            // 'active',

            //['class' => 'yii\grid\ActionColumn'],
            ['class' => 'yii\grid\ActionColumn',
                        'template' => '{active} {punish}',
                        'buttons' => [
                            'active' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-ok"></span>', null,['class'=>'active-feeling cursor-pointer', 'location'=>'/wonderkide/feeling/createlog/' . $model->id, 'title'=>'อนุมัติ']);
                            },
                            'punish' => function ($url, $model) {
                                return Html::a('<span class="glyphicon glyphicon-remove"></span>', null,['class'=>'punish-feeling cursor-pointer', 'location'=>'/wonderkide/feeling/punishlog/' . $model->id, 'title'=>'ไม่อนุมัติ']);
                            }
                        ]
            ],
        ],
    ]); ?>
</div>
<?php
$js = <<< JS
$('.active-feeling').click( function (e) {
    var url = $(this).attr('location');
    krajeeDialogCustConfirm.confirm("ต้องการอนุมัติค่าประสบการณ์ นี้ ใช่ไหม?", function (result) {
        if (result) {
            window.location = url;
        }
    });
});
$('.punish-feeling').click( function (e) {
    var url = $(this).attr('location');
    krajeeDialogCustConfirm.confirm("ต้องการลงโทษผู้ที่กดโพสใช่ไหม?", function (result) {
        if (result) {
            window.location = url;
        }
    });
});
JS;
 
// register your javascript
$this->registerJs($js);

?>