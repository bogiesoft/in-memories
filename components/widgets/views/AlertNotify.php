<?php

$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@WDAsset')."/css/alert-theme.css", [
    'depends' => ['yii\web\YiiAsset','yii\bootstrap\BootstrapAsset'],
]);

?>
<div class="alert-notify-box">
    <?php 
    if($model){
        foreach ($model as $row) { ?>
            <div class="alert alert-<?= $row->theme ?> alert-dismissible fade in" role="alert">
                <button type="button" class="close alert-checked" data-dismiss="alert" aria-label="Close" data-selected="<?= $row->id ?>"><span aria-hidden="true">&times;</span></button>
                <p><strong><span class="glyphicon glyphicon-info-sign"></span> <?= $row->title ?></strong></p> <?= $row->content ?>
            </div>

    <?php
    }
    }
    ?>
</div>
<?php
$js = <<< JS
$('.alert button.close').click( function (e) {
    var id = $(this).attr('data-selected');
    updateAlertActive(id, 'alert');
});
        
function updateAlertActive(data, action){
    var url = "/"+action+"/changeread";
        $.ajax({
            type: "POST",
            url: url,
            data:"selected="+data,
            success: function(success){
                if(success==0){
                    //alert("เกิดข้อผิดพลาด! กรุณาลองใหม่อีครั้งภายหลัง");
                    bootboxalert("small", "<i class='fa fa-times-circle' aria-hidden='true'></i> มีบางอย่างผิดพลาด", "กรุณาลองใหม่อีครั้งภายหลัง", null);
                }
                else{
                    return;
                }
            }
        });
}
JS;
 
// register your javascript
$this->registerJs($js);

?>