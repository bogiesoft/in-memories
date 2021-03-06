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
?>
<div class="row">
    <div class="col-md-4">
        <?= $this->render('/layouts/_menu_personal') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Personal Message :: Inbox</h3>
            </div>
            <div class="panel-body">
                <div class="personal-messages-model-index">
                    <div class="table-responsive">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id',
                            //'id_user_from',
                            [
                                    'class' => 'yii\grid\DataColumn',
                                    'attribute' => 'id_user_from',
                                    'format' => 'text',
                                    'value' => function ($data) {
                                        return UserModel::getName($data->id_user_from);
                                    },
                            ],
                            //'id_user_to',
                            'title',
                            'detail:ntext',
                            'create_time:date',
                            // 'update_time',
                            [
                                    'headerOptions' => ['class' => 'text-center'],
                                    'attribute' => 'read',
                                    'format' => 'raw',
                                    'value' => function ($data) {
                                        $checked = $data->read == 1 ? "checked":"";
                                        return '<div class="squaredThree'.$data->id.'">'
                                                    . '<input type="checkbox" value="None" id="squaredThree'.$data->id.'" name="check" '.$checked.' />'
                                                    . '<label title="ทำเครื่องหมายว่าอ่านแล้ว" class="read-checked" data-selected="'.$data->id.'" data-action="personal" for="squaredThree'.$data->id.'"></label>'

                                                . '</div>';
                                    }
                            ],

                            ['class' => 'yii\grid\ActionColumn',
                                    'template' => '{view} {delete}',
                                    'buttons' => [
                                        'view' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '/personal/view_pm/' . $model->id);
                                        },
                                        /*'update' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '/personal/edit_pm/' . $model->id);
                                        },*/
                                        'delete' => function ($url, $model) {
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', '#', ['class'=>'del-pm-message', 'data-selected'=>$model->id]);
                                        },
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
$(".del-pm-message").on("click", function() {
    var id = $(this).attr('data-selected');
    krajeeDialogCustConfirm.confirm("คุณต้องการลบข้อความนี้ใช่ไหม?", function (result) {
        if (result) {
            $.post("/personal/del_pm_inbox/"+id, function(a){
                if(a){
                    action = "success";
                    title = "เรียบร้อย!";
                    content = "ลบข้อความสำเร็จ";
                    notifyAnimate(action, title, content);
                    setTimeout(function(){
                        window.location = "/personal/inbox";
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