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
?>
<div class="row">
    <div class="col-md-4">
        <?= $this->render('/layouts/_menu_personal') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">จัดการรายการย่อย :: <?= $parent->name ?></h3>
            </div>
            <div class="panel-body">
                <div class="tags-custom-model-index">

                    <p>
                        <?= Html::a('เพิ่ม', ['/expend/createtagschild/'.$parent->id], ['class' => 'btn btn-default']) ?>
                    </p>
                    <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            //'id_user',
                            'name',
                            //'category',
                            'detail',
                            // 'parent_id',
                            // 'child',

                            ['class' => 'yii\grid\ActionColumn',
                                        'template' => '{update} {delete}',
                                        'buttons' => [
                                            'update' => function ($url, $model) {
                                                return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/expend/tagsupdatechild/' . $model->id);
                                            },
                                            'delete' => function ($url, $model) {
                                                return Html::a('<span class="glyphicon glyphicon-trash"></span>', '#' , ['class'=>'del-tag-custom', 'data-selected'=>$model->id]);
                                            }
                                        ]
                            ],
                        ],
                    ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$js = <<< JS
$(".del-tag-custom").on("click", function() {
    var id = $(this).attr('data-selected');
    krajeeDialogCustConfirm.confirm("คุณต้องการลบรายการนี้ใช่ไหม?", function (result) {
        if (result) {
            $.post("/expend/tagsdelete/"+id, function(a){
                if(a){
                    action = "success";
                    title = "เรียบร้อย!";
                    content = "ลบข้อความสำเร็จ";
                    notifyAnimate(action, title, content);
                    setTimeout(function(){
                        window.location = "/expend/tagschild/"+$parent->id;
                    }, 2000);
                }
                else{
                    action = "danger";
                    title = "เกิดข้อผิดพลาด!";
                    content = "กรุณาลองใหม่ภายหลัง";
                    notifyAnimate(action, title, content);
                }
            });
        }
    });
});
JS;
 
// register your javascript
$this->registerJs($js);

?>