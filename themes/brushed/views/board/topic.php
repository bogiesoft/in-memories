<?php
use app\models\BoardCommentModel;
use app\models\UserModel;
use yii\helpers\Html;
use app\components\helpFunction;
use app\components\widgets\LikeBox;
use yii\widgets\LinkPager;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Webboard', 'url' => ['/board/forum']];
//$this->params['breadcrumbs'][] = ['label' => 'Sample Post', 'url' => ['post/edit', 'id' => 1]];
$this->params['breadcrumbs'][] = $model->title;
$topic_user = UserModel::findOne($model->id_user);
?>
<?php
    echo Yii::$app->controller->renderPartial('layouts/_header',[]);
    echo Yii::$app->controller->renderPartial('layouts/_action',['model' => $model]);
?>

<div class="wb-topic-content">
        <div class="row">
            <div class="col-md-12">
                <div class="post-box">
                    <div class="post-box-content">
                        <h2 class="align-center"><?= $model->title ?></h2>
                        <div class="content"><?= $model->content ?></div>
                        <hr class="style14">
                        <div class="post-footer">
                            <div class="post-user">
                                <p>โพสโดย : <?= $topic_user->username ?></p>
                                <p>โพสเมื่อ : <?= helpFunction::dateTimeMinute($model->post_time) ?></p>
                                <?php
                                if($model->edit_time){ ?>
                                <p class="post-edit">แก้ไขล่าสุดเมื่อ : <?= helpFunction::dateTimeMinute($model->edit_time) ?></p>
                                <?php } ?>
                            </div>
                            <div class="post-action likebox">
                                <?= LikeBox::widget(['model' => $model, 'cat' => 'board', 'sub_cat' => 'topic', 'position' => 'right']) ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <?php 
        //$comment = BoardCommentModel::findComment($model->id);
        foreach ($comments as $row) { 
            $user = UserModel::findOne($row->id_user);
        ?>
        <div id="comment-link-<?= $row->id ?>" class="row">
            <div class="col-md-12">
                <div class="post-box comment">
                    <div class="user-data float-left">
                        <div class="post-box-content">
                            <p class="username"><a href="<?= Yii::$app->seo->getUrl('wonder/user') ?>/<?= $user->id ?>"><?= $user->username ?></a></p>
                            <p class="user-class"><?= Yii::$app->params['groupMember'][$user->permission] ?></p>
                            <?= Html::img($user->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':$user->image_crop, ['class' => 'img-responsive']) ?>
                            <hr class="style14">
                            <div class="other-detail">
                                <p class="post-time">ตอบกลับ : <?= BoardCommentModel::countAllReply($user->id) ?></p>
                                <p class="post-time">โพสเมื่อ : <?= helpFunction::humanTiming(strtotime($row->post_time)) ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="post-content float-left">
                        <div class="post-box-content">
                            <div class="comment-action">
                                <?php
                                if($row->id_user == Yii::$app->user->id){ ?>
                                <a href="/board/editcomment/<?= $row->id ?>" class="btn btn-default btn-xs">แก้ไข</a>
                                <?php } ?>
                                <a href="/board/comment/<?= $model->id ?>?reply=<?= $row->id ?>" class="btn btn-default btn-xs">ตอบกลับความคิดเห็นนี้</a>
                            </div>
                            <p class="head-reply">[RE:<?= $model->title ?>]</p>
                            <div class="content">
                                <?= $row->content ?>
                            </div>
                            
                            <?php 
                            if($row->edit_time){ ?>
                                <br>
                                <hr class="style2">
                                <div class="time-edit">
                                    แก้ไขครั้งล่าสุดเมื่อ <?= helpFunction::dateTimeMinute($row->edit_time) ?>
                                </div>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <?php 
        $parents = BoardCommentModel::findParent($row->id);
        foreach ($parents as $parent) { 
            $parent_user = UserModel::findOne($parent->id_user); ?>
    
            <!-- parent comment -->
            <div id="comment-link-<?= $parent->id ?>" class="parent-comment">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-box comment">
                        <div class="user-data float-left">
                            <div class="post-box-content">
                                <p class="username"><a href="<?= Yii::$app->seo->getUrl('wonder/user') ?>/<?= $parent_user->id ?>"><?= $parent_user->username ?></a></p>
                                <p class="user-class"><?= Yii::$app->params['groupMember'][$parent_user->permission] ?></p>
                                <?= Html::img($parent_user->image_crop == '' ? Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/df_profile.png':$parent_user->image_crop, ['class' => 'img-responsive']) ?>
                                <hr class="style14">
                                <div class="other-detail">
                                    <p class="post-time">ตอบกลับ : <?= BoardCommentModel::countAllReply($parent_user->id) ?></p>
                                    <p class="post-time">โพสเมื่อ : <?= helpFunction::humanTiming(strtotime($parent->post_time)) ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="post-content float-left">
                            <div class="post-box-content">
                                <div class="comment-action">
                                    <?php
                                    if($parent->id_user == Yii::$app->user->id){ ?>
                                    <a href="/board/editcomment/<?= $parent->id ?>" class="btn btn-default btn-xs">แก้ไข</a>
                                    <?php } ?>
                                    <a href="/board/comment/<?= $model->id ?>?reply=<?= $row->id ?>&to=<?= $parent->id_user ?>" class="btn btn-default btn-xs">ตอบกลับความคิดเห็นนี้</a>
                                </div>
                                <p class="head-reply">[RE:<?= $model->title ?>]</p>
                                <div class="content">
                                    <?= $parent->content ?>
                                </div>

                                <?php 
                                if($parent->edit_time){ ?>
                                    <br>
                                    <hr class="style2">
                                    <div class="time-edit">
                                        แก้ไขครั้งล่าสุดเมื่อ <?= helpFunction::dateTimeMinute($parent->edit_time) ?>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            </div>
        <?php }
        
        } ?>
</div>
<?php
// display pagination
echo LinkPager::widget([
    'pagination' => $pages,
]);