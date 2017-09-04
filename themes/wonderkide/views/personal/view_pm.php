<?php
use yii\helpers\Html;
use app\components\helpFunction;
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
                <h3 class="panel-title">Personal Message :: view</h3>
            </div>
            <div class="panel-body">
                <section class="personal-messages-view">

                    
                    <table class="table-bordered">
                        <tbody>
                            <tr>
                                <td class="user-detail">
                                    <p class="username"><a href="<?= Yii::$app->seo->getUrl('wonder/user') ?>/<?= $user->id ?>"><?php if($user->nickname){echo$user->nickname; }else{echo $user->username; } ?></a></p>
                                    <p class="user-class"><?= Yii::$app->params['groupMember'][$user->permission] ?></p>
                                    <?= Html::img($user->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':$user->image_crop, ['class' => 'img-responsive']) ?>
                                    <hr class="style14">
                                    <div class="other-detail">
                                        <p class="post-time">โพสเมื่อ  </p>
                                        <p><?= helpFunction::dateTimeMinute($model->create_time) ?></p>
                                    </div>
                                </td>
                                <td class="content">
                                    <div class="pm-action">
                                        <a href="/personal/sent?to=<?= $model->id_user_from ?>" class="btn btn-default btn-xs">ตอบกลับ</a>
                                        <a id="del-pm" href="#" data-selected="<?= $model->id ?>" class="btn btn-default btn-xs">ลบ</a>
                                    </div>
                                    <div class="pm-header">
                                        <label class="header">[<?= $model->title ?>]</label>
                                    </div>
                                    <div class="comment-detail">
                                        <?= $model->detail ?>
                                    </div>
                                    <?php 
                                    if($model->update_time){ ?>
                                    <br>
                                    <hr class="style4">
                                    <div class="time-edit">
                                        แก้ไขครั้งล่าสุดเมื่อ <?= helpFunction::dateTimeMinute($model->update_time) ?>
                                    </div>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </section>
            </div>
        </div>
    </div>
</div>
<?php
$js = <<< JS
$("#del-pm").on("click", function() {
    krajeeDialogCustConfirm.confirm("คุณต้องการลบข้อความนี้ใช่ไหม?", function (result) {
        if (result) {
        var id = $("#del-pm").attr('data-selected');
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