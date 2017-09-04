<?php
use yii\helpers\Url;
use kartik\widgets\FileInput;
?>

<?=
FileInput::widget([
                   'name' => 'upload_ajax[]',
                   'options' => ['multiple' => true,'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                    'pluginOptions' => [
                        'overwriteInitial'=>false,
                        'initialPreviewShowDelete'=>true,
                        'initialPreview'=> $initialPreview,
                        'initialPreviewConfig'=> $initialPreviewConfig,
                        'uploadUrl' => Url::to(['/gallery/upload-ajax']),
                        'uploadExtraData' => [
                            'ref' => $model->ref,
                            'id' => $model->id,
                        ],
                        'maxFileCount' => 100,
                    ]
]);
?>
<style>
    .gallery-browse-tooltip{
        top:-40px;
        display: block;
    }
    .gallery-upload-tooltip{
        top:-40px;
        left: 25%;
        display: block;
    }
</style>
 

<?php
if(Yii::$app->controller->action->id == "add"){
$js = <<< JS
$(".input-group.file-caption-main .input-group-btn").append('<div class="popover top gallery-browse-tooltip"><div class="arrow"></div><div class="popover-content">เลือกไฟล์</div></div>');
$('input[type="file"]').on("change", function() {
    $(".gallery-browse-tooltip").remove();
    $(".input-group.file-caption-main .input-group-btn").append('<div class="popover top gallery-upload-tooltip"><div class="arrow"></div><div class="popover-content">กด Upload</div></div>');
});
$(".fileinput-upload-button").on("click", function() {
    $(".gallery-upload-tooltip").remove();
});
$('.kv-upload-progress').bind("DOMSubtreeModified",function(){
    if($(this).find(".progress-bar").attr("aria-valuenow")=="100"){
        action = "success";
        title = "เรียบร้อย!";
        content = "อัพโหลดรูปภาพเสร็จสมบูรณ์";
        notifyAnimate(action, title, content);
        setTimeout(function(){ window.location = "/gallery/add?album=$model->ref&active=sort"; }, 3000);
    }
});

JS;
 
// register your javascript
$this->registerJs($js);
}else{
$js = <<< JS
$('.kv-upload-progress').bind("DOMSubtreeModified",function(){
    if($(this).find(".progress-bar").attr("aria-valuenow")=="100"){
        action = "success";
        title = "เรียบร้อย!";
        content = "อัพโหลดรูปภาพเสร็จสมบูรณ์";
        notifyAnimate(action, title, content);
        setTimeout(function(){ window.location = "/gallery/manage/$model->ref?active=uploaded"; }, 3000);
    }
});
JS;
 
// register your javascript
$this->registerJs($js);
}
$js = <<< JS
$(".file-initial-thumbs .kv-file-remove").on("click", function() {
    setTimeout(function(){ window.location = "/gallery/manage/$model->ref?active=uploaded"; }, 1000);
});
JS;
$this->registerJs($js);
?>