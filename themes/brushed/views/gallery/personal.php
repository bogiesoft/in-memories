<?php

use app\models\GalleryImagesModel;
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
<?php $this->beginContent('@app/views/layouts/_tab_personal.php', ['active' => 'gallery']); ?>
    <div class="col-md-4">
        <?= $this->render('_menu') ?>
    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">แกลอรี่ส่วนตัว</h3>
            </div>
            <div class="panel-body">
                <div class="manage-gallery">
                        <?php 
                            if($gallery){
                            foreach ($gallery as $row) {
                                $images = GalleryImagesModel::getImageFirst($row->id);
                            ?>
                                <div class="image-gallery">
                                    <div class="image-gallery-wrapper gallery-main">

                                        <div class="image">
                                            <img src="<?= $images ? $images:Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/noimage.jpg' ?>" alt="" />
                                        </div>
                                        <div class="label">
                                            <div class="label-text">
                                                <a href="/gallery/manage/<?= $row->ref ?>" class="text-title"><?= $row->name ?></a>
                                                <!--<span class="text-category">APP</span>-->
                                            </div>
                                            <div class="label-bg"></div>
                                        </div>
                                        <div class="label-action">
                                            <div class="btn-action">
                                                <a class="del-gallery pull-right" data-name="<?= $row->name ?>" data-selected="<?= $row->ref ?>" title="ลบ"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
                                                <a href="/gallery/manage/<?= $row->ref ?>" class="pull-left" title="แก้ไข"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="label-bg"></div>
                                        </div>
                                        <!--<span class="pin"></span>-->
                                    </div>
                                </div>
                            <?php 

                                }
                            }else{ ?>
                            <p class="text-danger text-center">ไม่พบข้อมูล</p>
                        <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>
<?php
$js = <<< JS
$(".del-gallery").on("click", function() {
    var name = $(this).attr('data-name');
    var data = $(this).attr('data-selected');
    krajeeDialogCustConfirm.confirm("คุณต้องการลบ Gallery "+name+" ใช่ไหม?", function (result) {
        if (result) {
            $.post("/gallery/delete?id="+data, function(a){
                if(a){
                    action = "success";
                    title = "เรียบร้อย!";
                    content = "ลบ Gallery สำเร็จ";
                    notifyAnimate(action, title, content);
                    setTimeout(function(){
                        window.location = "/gallery/personal";
                    }, 3000);
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