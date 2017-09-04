<?php
use yii\helpers\Html;
use app\models\UserModel;
use app\components\helpFunction;
use app\models\LogRankModel;
use app\models\RankModel;
?>
<div class="notify-show-list list-group">
    <div class="dropdown-menu notify-dropdown">
    <?php
    if($model){
    foreach ($model as $row) { 
        if($row->category == 'rank'){ 
            $rank = LogRankModel::findOne($row->id_cat);
            ?>
            <div class="notify-items">
                <a href="<?= $row->url ?>" class="list-group-item notify-show <?= $row->active == 0 ? 'non-active':'' ?>" data-selected="<?= $row->id ?>">
                    <div class="noti-img">
                        <?= Html::img(\app\models\MainDataModel::getLogoUrl(), ['class' => 'img-responsive']) ?>
                    </div>
                    <div class="noti-content">
                        <p>ท่านได้รับการเลื่อนยศจาก <strong><?= RankModel::getName($rank->rank) ?></strong> เป็น <strong><?= RankModel::getName($rank->rank_up) ?></strong></p>
                        <p class="time"><span class="fa fa-level-up"></span> <?= helpFunction::humanTiming(strtotime($row->create_time)) ?></p>
                    </div>

                    <div class="clearfix"></div>

                </a>
                <div class="noti-trigger"><span href="#"><i title="<?= $row->active == 0 ? 'ทำเครื่องหมายว่าอ่านแล้ว':'อ่านแล้ว' ?>" class="selected-noti-trigger fa <?= $row->active == 0 ? 'fa-circle-o':'fa-circle' ?>" aria-hidden="true" data-selected="<?= $row->id ?>" data-active="<?= $row->active == 0 ? 'false':'true' ?>"></i></span></div>
            </div>
        <?php }else{ 
        $user = UserModel::findOne($row->id_user);
        $icon = '';
        $back = 'ของคุณ';
        if($row->action == "like"){
            $action = $like;
            $icon = 'glyphicon glyphicon-thumbs-up';
        }
        if($row->action == "feeling"){
            $action = $feel;
            $icon = 'glyphicon glyphicon-star';
            $row->category = "comment";
        }
        if($row->action == "comment"){
            $icon = 'glyphicon glyphicon-comment';
            if($row->category != "comment"){
                $action = $parent_comment;
            }
            else{
                $action = $child_comment;
                $back = 'ที่มีคุณ';
            }
            
        }
    ?>
    <div class="notify-items">
        <a href="<?= $row->url ?>" class="list-group-item notify-show <?= $row->active == 0 ? 'non-active':'' ?>" data-selected="<?= $row->id ?>">
            <div class="noti-img">
                <?= Html::img($user->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':$user->image_crop, ['class' => 'img-responsive']) ?>
            </div>
            <div class="noti-content">
                <p><strong><?= $user->nickname ? $user->nickname : $user->username ?></strong> ได้<?= $action ?> <strong><?= ucfirst($row->category) ?></strong> <?= $back ?></p>
                <p class="time"><span class="<?= $icon ?>"></span> <?= helpFunction::humanTiming(strtotime($row->create_time)) ?></p>
            </div>

            <div class="clearfix"></div>

        </a>
        <div class="noti-trigger"><span href="#"><i title="<?= $row->active == 0 ? 'ทำเครื่องหมายว่าอ่านแล้ว':'อ่านแล้ว' ?>" class="selected-noti-trigger fa <?= $row->active == 0 ? 'fa-circle-o':'fa-circle' ?>" aria-hidden="true" data-selected="<?= $row->id ?>" data-active="<?= $row->active == 0 ? 'false':'true' ?>"></i></span></div>
    </div>
    <?php }}
    if($limit){ ?>
    <a href="/notify" class="list-group-item show-all text-center">ดูทั้งหมด</a>
    <?php } 
    }else{
    ?>
    <div class="widget-content">
        <p class="text-center text-danger"><strong>ยังไม่มีการแจ้งเตือน</strong></p>
    </div>
    <?php } ?>
    </div>
</div>
<?php
$js = <<< JS
$('.notify-show.non-active').click( function (e) {
    var data = $(this).attr('data-selected');
    updateNotifyActive(data);
});
        
$('.notify-items').mouseover(function() {
    $(this).find('.noti-trigger').show();
}).mouseout(function() {
    $(this).find('.noti-trigger').hide();
});
        
$('.selected-noti-trigger').click( function (e) {
    if($(this).attr('data-active')=='false'){
        var data = $(this).attr('data-selected');
        updateNotifyActive(data);
        $(this).parent().parent().parent().find('.notify-show').removeClass('non-active');
        $(this).attr('data-active', true);
        $(this).removeClass('fa-circle-o');
        $(this).addClass('fa-circle');
    }
});
        
function updateNotifyActive(data){
    $.ajax({
        type: "POST",
        url: "/notify/active",
        data:"selected="+data,
        success: function(r){

                if(r == 1){
        
                    var last = $('#notify-badge').text();
                    if(last && last > 0){
                        $('#notify-badge').text(last-1);
                    }
                }
        }
    });
}
JS;
 
// register your javascript
$this->registerJs($js);

?>