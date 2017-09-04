<?php

use yii\helpers\Html;

?>
<div class="feeling-box box-<?= $id_comment ?> <?= $id_user_owner != Yii::$app->user->id ? 'active-feeling': '' ?>" data-selected="<?= $id_comment ?>" data-owner="<?= $id_user_owner ?>" title="<?= $active ? 'ยกเลิก':'มีสาระ' ?>">
    <label data="<?= $count ?>" class="label-feeling-<?= $id_comment ?> <?= $active ? 'active': '' ?>"><?= $count ?></label>
    <?php
    if($id_user_owner != Yii::$app->user->id){ ?>
    <?= Html::img($active ? $icon_active: $icon, ['id'=>'feeling-comment-'.$id_comment, 'class' => $active ? 'active img-responsive feeling-comment-'.$id_comment: 'img-responsive feeling-comment-'.$id_comment, 'alt'=>'feeling']) ?>
    <?php }else{
        echo Html::img($icon_active, ['id'=>'feeling-comment-'.$id_comment, 'class' => 'active img-responsive feeling-comment-'.$id_comment,'data-selected'=>$id_comment,'data-owner'=>$id_user_owner, 'alt'=>'feeling']);
    }
    ?>
</div>
<?php
$js = <<< JS
$(".active-feeling").on("click", function() {
    var id = $(this).attr('data-selected');
    var user = $(this).attr('data-owner');
    var url = "/feeling/update-feeling";
        $.ajax({
            type: "POST",
            url: url,
            data:"selected="+id+"&owner="+user,
            success: function(result){
                if(result==1){
                    if($('.feeling-comment-'+id).hasClass('active')){
                        $('.feeling-comment-'+id).attr('src', '$icon');
                        $('.feeling-comment-'+id).removeClass('active');
                        $('.feeling-box.box-'+id).attr('title', 'มีสาระ');
                        label = parseInt($('.label-feeling-'+id).attr('data'))-1;
                        $('.label-feeling-'+id).text(label);
                        $('.label-feeling-'+id).attr('data', label);
                        console.log(label)
                    }else{
                        $('.feeling-comment-'+id).attr('src', '$icon_active');
                        $('.feeling-comment-'+id).addClass('active');
                        $('.feeling-box.box-'+id).attr('title', 'ยกเลิก');
                        label = parseInt($('.label-feeling-'+id).attr('data'))+1;
                        $('.label-feeling-'+id).text(label);
                        $('.label-feeling-'+id).attr('data', label);
                    }
                }
                else if(result==8){
                            action = "warning";
                            title = "กรุณาเข้าสู่ระบบ!";
                            content = "ท่านต้องเข้าสู่ระบบก่อน";
                            notifyAnimate(action, title, content);
                }
                else if(result==2){
                            action = "warning";
                            title = "แต้มไม่พอ!";
                            content = "ท่านได้ใช้แต้มไปหมดแล้ว";
                            notifyAnimate(action, title, content);
                }
                else{
                    action = "danger";
                    title = "เกิดข้อผิดพลาด!";
                    content = "กรุณาลองใหม่ภายหลัง";
                    notifyAnimate(action, title, content);
                }
            }
        });
});

JS;
 
// register your javascript
$this->registerJs($js);