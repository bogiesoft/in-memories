<?php
use app\components\helpFunction;
use app\models\UserModel;
use yii\helpers\Html;
use app\components\widgets\reportButton;
use app\components\widgets\feelingComment;

$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@WDAsset')."/css/comment.css", [
    'depends' => ['yii\web\YiiAsset','yii\bootstrap\BootstrapAsset'],
]);
?>

<?php
if(!$pagination && $top_model){
foreach ($top_model as $row) { 
    $user = UserModel::findOne($row->id_user);
    $rank = app\models\RankModel::findOne($user->id_rank);

?>
<article id="data-comment-<?= $row->id ?>" class="comment-box top-feeling <?= $parent ? "child":"" ?>">
    <div class="row">
        <div class="col-md-2">
            <div class="user-detail-box">
                <div class="user-detail">
                    <p class="username"><a href="<?= Yii::$app->seo->getUrl('wonder/user') ?>/<?= $user->id ?>"><?php if($user->nickname){echo$user->nickname; }else{echo $user->username; } ?></a></p>
                    <p class="user-class"><?= $rank->name ?> :: <?= $rank->name_th ?></p>
                    <?= Html::img($user->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':$user->image_crop, ['class' => 'img-responsive']) ?>
                    <hr class="style14">
                    <div class="other-detail">
                        <p class="post-time">โพสเมื่อ : <?= helpFunction::humanTiming(strtotime($row->create_time)) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="comment-detail-box">
                                    
                <div class="comment-detail">
                    <div class="comment-header">
                        <label class="header">[RE:<?= $title ?>]</label>
                    </div>
                    <div class="comment-action">
                        <?php
                        if($row->id_user == Yii::$app->user->id){ ?>
                        <a href="/<?= $category ?>/editcomment/<?= $row->id ?>" class="btn btn-default btn-xs">แก้ไข</a>
                        <?php } ?>
                        <a href="/<?= $category ?>/comment/<?= $id_category ?>?reply=<?= $parent ? $parent : $row->id ?>&to=<?= $row->id_user ?>" class="btn btn-default btn-xs">ตอบกลับ</a>
                        <?= reportButton::widget(['id_cat'=>$row->id, 'id_user'=>$row->id_user, 'category'=>'comment', 'btn_size'=>'xs']) ?>
                    </div>
                    <div class="comment-detail">
                        <?= $row->content ?>
                    </div>
                    
                    <div class="feeling">
                        <?= feelingComment::widget(['id_comment'=>$row->id, 'count'=>$row->feeling, 'id_user_owner'=>$row->id_user]) ?>
                    </div>
                    
                    <?php 
                    if($row->update_time){ ?>
                    <br>
                    <hr class="style4">
                    <div class="time-edit">
                        แก้ไขครั้งล่าสุดเมื่อ <?= helpFunction::dateTimeMinute($row->update_time) ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</article>
<?php 
    if(!$parent){
    $get_parent = app\models\CommentModel::find()->where(['id_parent'=>$row->id, 'id_cat'=>$id_category, 'category'=>$category])->all();
        if($get_parent){
            echo \app\components\widgets\commentBox::widget(['model'=>$get_parent, 'title'=>$title, 'category'=>$category, 'id_category'=>$id_category, '_parent'=>$row->id]);
        }
    }
}
}
    
?>

<?php
foreach ($model as $row) {
    $user = UserModel::findOne($row->id_user);
    $rank = app\models\RankModel::findOne($user->id_rank);
?>
<article id="data-comment-<?= $row->id ?>" class="comment-box <?= $parent ? "child":"" ?> <?= $row->banned == 1 ? "box-banned":"" ?>">
    <?php
    if($row->banned == 1){ 
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="box-banned">
                <p><?= $banned1 ?></p>
                <p><?= $banned2 ?></p>
            </div>
        </div>
    </div>
    <?php }
    else{ ?>
    <div class="row">
        <div class="col-md-2">
            <div class="user-detail-box">
                <div class="user-detail">
                    <p class="username"><a href="<?= Yii::$app->seo->getUrl('wonder/user') ?>/<?= $user->id ?>"><?php if($user->nickname){echo$user->nickname; }else{echo $user->username; } ?></a></p>
                    <p class="user-class"><?= $rank->name ?> :: <?= $rank->name_th ?></p>
                    <?= Html::img($user->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':$user->image_crop, ['class' => 'img-responsive']) ?>
                    <hr class="style14">
                    <div class="other-detail">
                        <p class="post-time">โพสเมื่อ : <?= helpFunction::humanTiming(strtotime($row->create_time)) ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="comment-detail-box">
                                    
                <div class="comment-detail">
                    <div class="comment-header">
                        <label class="header">[RE:<?= $title ?>]</label>
                    </div>
                    <div class="comment-action">
                        <?php
                        if($row->id_user == Yii::$app->user->id){ ?>
                        <a href="/<?= $category ?>/editcomment/<?= $row->id ?>" class="btn btn-default btn-xs">แก้ไข</a>
                        <?php } ?>
                        <a href="/<?= $category ?>/comment/<?= $id_category ?>?reply=<?= $parent ? $parent : $row->id ?>&to=<?= $row->id_user ?>" class="btn btn-default btn-xs">ตอบกลับ</a>
                        <?= reportButton::widget(['id_cat'=>$row->id, 'id_user'=>$row->id_user, 'category'=>'comment', 'btn_size'=>'xs']) ?>
                    </div>
                    <div class="comment-detail">
                        <?= $row->content ?>
                    </div>
                    
                    <div class="feeling">
                        <?= feelingComment::widget(['id_comment'=>$row->id, 'count'=>$row->feeling, 'id_user_owner'=>$row->id_user]) ?>
                    </div>
                    
                    <?php 
                    if($row->update_time){ ?>
                    <br>
                    <hr class="style4">
                    <div class="time-edit">
                        แก้ไขครั้งล่าสุดเมื่อ <?= helpFunction::dateTimeMinute($row->update_time) ?>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</article>
<?php 
    if(!$parent){
    $get_parent = app\models\CommentModel::find()->where(['id_parent'=>$row->id, 'id_cat'=>$id_category, 'category'=>$category])->all();
        if($get_parent){
            echo \app\components\widgets\commentBox::widget(['model'=>$get_parent, 'title'=>$title, 'category'=>$category, 'id_category'=>$id_category, '_parent'=>$row->id]);
        }
    }
} 
    
?>
<?php
$js = <<< JS
checkScrollToComment(); //scroll to position comment ID
        
function checkScrollToComment(){
    //alert($(window.location.hash).offset().top );
    if (window.location.hash != null && window.location.hash != ''){
            $('body').animate({
                scrollTop: $(window.location.hash).offset().top - $('.sticky-nav').height() //clear height from mainMenu
            }, 1000);
    }
}
JS;
 
// register your javascript
$this->registerJs($js);

?>