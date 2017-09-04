<?php
use yii\bootstrap\Tabs;
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
<section class="photo-gallery">
    <?php 
    if($model->isNewRecord){ ?>
        <h3 class="text-center pull-left">สร้าง Gallery ใหม่</h3>
    <?php 
    }else{ 
    ?>
    <h3 class="text-center pull-left">Gallery ::: <?= $model->name ?></h3>
    <?php } ?>
    <div class="gallery-action pull-right">
        <!--<a class="btn btn-info" href="/gallery"><span class="glyphicon glyphicon-repeat"></span> กลับสู้หน้า Gallery</a>-->
        <a class="btn btn-info" onclick="location.reload();"><span class="glyphicon glyphicon-repeat"></span> Refresh</a>
        <?php
        if($gallery){ ?>
        <a id="del-gallery" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> ลบ Gallery</a>
        <?php } ?>
    </div>
    <div class="clearfix"></div>
<?php

$item = [[
            'label' => 'จัดการ Gallery',
            'content' => Yii::$app->controller->renderPartial('_content',['model' => $model]),
            'active' => $active == 'manage' || !$active ? true:FALSE,
            //'options' => ['class' => 'eng-epl'],
        ]];

        if($gallery){
        array_push($item,[
            'label' => 'อัพโหลดรูปภาพ',
            'content' =>  Yii::$app->controller->renderPartial('_photo',[
                'model' => $model, 
                'initialPreview'=>$initialPreview, 
                'initialPreviewConfig'=>$initialPreviewConfig ])
                    
        ]);
        }
        if($initialPreview && $initialPreviewConfig){
            array_push($item,[
                'label' => 'จัดการรูปภาพ',
                'content' => Yii::$app->controller->renderPartial('_sort',['model' => $model]),
                'active' => $active == 'sort' ? true:FALSE,
            ]);
        }

echo Tabs::widget([
    'items' => $item
]);

$js = <<< JS
$("#del-gallery").on("click", function() {
    krajeeDialogCustConfirm.confirm("คุณต้องการลบ Gallery $model->name ใช่ไหม?", function (result) {
        if (result) {
            $.post("/gallery/delete?id=$gallery", function(a){
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
    
</section>
