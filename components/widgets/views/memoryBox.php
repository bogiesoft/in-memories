<?php
use app\models\GalleryImagesModel;
use app\models\MemoryModel;
use app\models\CommentModel;
use app\components\helpFunction;
use app\models\UserModel;

?>

<?php if($model){
    foreach ($model as $key => $row) {
        //show image block if image
        if($row->image_thumb){
            $img = $row->image_thumb;
        }
        else if($row->gallery_tags && $row->gallery_tags !=''){
            $tag = explode(',', $row->gallery_tags);
            $img = GalleryImagesModel::getImageFirst($tag[0]);
        }
        else{
            $img = null;
        }
        $count_comment = CommentModel::countComment($row->id, 'memory');
        $user = UserModel::findOne($row->id_user);
?>
<article class="<?php if($key%2==0){echo 'odd-item animated fadeInRight';}else{echo 'even-item animated fadeInLeft';}?>" data-showonscroll="true" data-animation="fadeIn">
    <?php
    if($img){ ?>
        <figure class="sec-image">

            <a class="post-thumbnail" href="<?= Yii::$app->seo->getUrl('memory/view') ?>/<?= $row->id ?>">
                <img src="<?= $img ?>" />
            </a>

            <div class="top-bar">
                <!--<span class="likes"><a href="#"><i class="fa fa-heart"></i> 99</a></span>-->

                <span class="comments"><i class="fa fa-comments"></i> <?= $count_comment ?></span>

                <span class="view"><i class="fa fa-eye" aria-hidden="true"></i> <?= $row->read ?> </span>
            </div>

            <!--<div class="bottom-bar">
                <span class="btn-srp"><a href="#">เพิ่มเติม...</a></span>

                <div class="rating">
                    <div class="stars retina x-2">
                        <div class="gray"><i></i><i></i><i></i><i></i><i></i></div>

                        <div class="fill" style="width: 50%">
                            <div class="light"><i></i><i></i><i></i><i></i><i></i></div>
                        </div>
                    </div>
                </div>

            </div>-->

        </figure>
    <?php } ?>
        <div class="sec-desc">

            <header class="title">
                <a href="<?= Yii::$app->seo->getUrl('memory/view') ?>/<?= $row->id ?>"><h3 class="post-title"><?= $row->title ?></h3></a>
            </header>

            <div class="meta-info">
                <span class="author"><i class="fa fa-user"></i><a href="<?= Yii::$app->seo->getUrl('wonder/user') ?>/<?= $user->id ?>"> <?= $user->nickname ? $user->nickname:$user->username ?></a></span>

                <span class="date-time"><i class="fa fa-clock-o"></i> <?= helpFunction::humanTiming(strtotime($row->create_time)) ?></span>

            </div>


            <div class="post-desc">
                <p><?= MemoryModel::filterContent($row->content, $cut) ?></p>
            </div>

        </div>
</article>

<div class="clearfix"></div>
<?php if($key < count($model)-1){ ?>
<div class="divider-box"></div>
<?php 
        }
    }

}
     
else{ ?>
    <p class="text-danger text-center">ไม่พบข้อมูล</p>
<?php } ?>