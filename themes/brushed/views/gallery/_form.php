<?php
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@BRUSHAsset')."/css/jquery.steps.css", [
    'depends' => ['yii\web\YiiAsset','yii\bootstrap\BootstrapAsset'],
]);
$this->registerJsFile(Yii::$app->assetManager->getPublishedUrl('@BRUSHAsset')."/js/jquery.steps.min.js", ['depends' => [\yii\web\JqueryAsset::className()]]);
?>
<div class="wizard">
    <div class="steps clearfix">
        <ul role="tablist">
            <li role="tab" class="<?php if(!$active || ($active&&$active=='gallery')){echo 'current';}else{echo'done';} ?>" id="tab-manage-gallery" aria-selected="<?= (!$active || $active&&$active=='gallery') ?'true':'false' ?>" aria-enabled="true">
                <a>
                    <span class="number"></span> แก้ไขแกลอรี่
                </a>
            </li>
            <li role="tab" class="<?php if($active&&$active=='uploaded'){echo'current';}else{echo'done';} ?>" id="tab-upload-image" aria-selected="<?= $active&&$active=='uploaded' ?'true':'false' ?>" aria-enabled="true">
                <a>
                    <span class="number"></span> เพิ่ม-ลบรูปภาพ
                </a>
            </li>
            <li role="tab" class="<?php if($active&&$active=='sort'){echo 'current';}else{echo'done';} ?>" id="tab-manage-image" aria-selected="<?= $active&&$active=='sort' ?'true':'false' ?>" aria-enabled="true">
                <a>
                    <span class="number"></span> จัดการรูปภาพ
                </a>
            </li>
        </ul>
    </div>
    <div class="content clearfix">
        <section id="manage-gallery" class="body <?= !$active || ($active&&$active=='gallery') ?'':'hidden' ?>">
            <?=Yii::$app->controller->renderPartial('_content',['model' => $model])?>
        </section>
        <section id="upload-image" class="body <?= $active&&$active=='uploaded' ?'':'hidden' ?>">
            <?=Yii::$app->controller->renderPartial('_photo',[
                    'model' => $model, 
                    'initialPreview'=>$initialPreview, 
                    'initialPreviewConfig'=>$initialPreviewConfig ])
            ?>
        </section>
        <section id="manage-image" class="body <?= $active&&$active=='sort' ?'':'hidden' ?>">
            <?= Yii::$app->controller->renderPartial('_sort',['model' => $model]) ?>
        </section>
    </div>
</div>

<?php
$js = <<< JS
$("#tab-manage-gallery").on("click", function() {
    if($(this).attr("aria-selected")=="false" && $(this).attr("aria-enabled")=="true"){
        $(this).attr("aria-selected","true");
        $(this).removeClass("done").addClass("current");
        $("#manage-gallery").removeClass("hidden");
        
        if($("#tab-upload-image").attr("aria-enabled")=="true" && $("#tab-upload-image").attr("aria-selected")=="true"){
            $("#tab-upload-image").removeClass("current").addClass("done");
            $("#upload-image").addClass("hidden");
            $("#tab-upload-image").attr("aria-selected","false");
        }
        if($("#tab-manage-image").attr("aria-enabled")=="true" && $("#tab-manage-image").attr("aria-selected")=="true"){
            $("#tab-manage-image").removeClass("current").addClass("done");
            $("#manage-image").addClass("hidden");
            $("#tab-manage-image").attr("aria-selected","false");
        }
    }
});
$("#tab-upload-image").on("click", function() {
    if($(this).attr("aria-selected")=="false" && $(this).attr("aria-enabled")=="true"){
        $(this).attr("aria-selected","true");
        $(this).removeClass("done").addClass("current");
        $("#upload-image").removeClass("hidden");
        
        if($("#tab-manage-gallery").attr("aria-enabled")=="true" && $("#tab-manage-gallery").attr("aria-selected")=="true"){
            $("#tab-manage-gallery").removeClass("current").addClass("done");
            $("#manage-gallery").addClass("hidden");
            $("#tab-manage-gallery").attr("aria-selected","false");
        }
        if($("#tab-manage-image").attr("aria-enabled")=="true" && $("#tab-manage-image").attr("aria-selected")=="true"){
            $("#tab-manage-image").removeClass("current").addClass("done");
            $("#manage-image").addClass("hidden");
            $("#tab-manage-image").attr("aria-selected","false");
        }
    }
});
$("#tab-manage-image").on("click", function() {
    if($(this).attr("aria-selected")=="false" && $(this).attr("aria-enabled")=="true"){
        $(this).attr("aria-selected","true");
        $(this).removeClass("done").addClass("current");
        $("#manage-image").removeClass("hidden");
        
        if($("#tab-manage-gallery").attr("aria-enabled")=="true" && $("#tab-manage-gallery").attr("aria-selected")=="true"){
            $("#tab-manage-gallery").removeClass("current").addClass("done");
            $("#manage-gallery").addClass("hidden");
            $("#tab-manage-gallery").attr("aria-selected","false");
        }
        if($("#tab-upload-image").attr("aria-enabled")=="true" && $("#tab-upload-image").attr("aria-selected")=="true"){
            $("#tab-upload-image").removeClass("current").addClass("done");
            $("#upload-image").addClass("hidden");
            $("#tab-upload-image").attr("aria-selected","false");
        }
    }
});
JS;
 
// register your javascript
$this->registerJs($js);

?>