<?php
use app\models\GalleryImagesModel;
use app\models\CommentModel;
?>
<?php 
if($model){
foreach ($model as $row) {
    $images = GalleryImagesModel::getImageFirst($row->id);
    if($images){
    $comment = CommentModel::countComment($row->id, 'gallery');
    
    if($render != 'index'){
        $ran = array_rand(Yii::$app->params['animate'],1);
        $selected = Yii::$app->params['animate'][$ran];
        //var_dump($selected);
        $animate = 'animated ' . $selected;
    }
?>
    <div class="image-gallery <?= $render ?> <?= isset($animate) ? $animate :"" ?>">
            <div class="image-gallery-wrapper <?= $render ?>">

                <a class="text-title" href="<?= Yii::$app->seo->getUrl('gallery/view') ?>/<?= $row->ref ?>">
                <div class="image">
                    <img src="<?= $images ?>" alt="" />
                </div>
                <div class="label label-top">
                    <div class="label-text">
                        <span class="view pull-left"><i class="fa fa-eye" aria-hidden="true"></i> <?= $row->read ?></span>
                        <span class="comment pull-right"><i class="fa fa-comments" aria-hidden="true"></i> <?= $comment ?></span>
                        <div class="clearfix"></div>
                    </div>
                    <div class="label-bg"></div>
                </div>
                <div class="label">
                    <div class="label-text">
                        <span><?= strtoupper($row->name) ?></span>
                    </div>
                    <div class="label-bg"></div>
                </div>
                </a>
                <!--<span class="pin"></span>-->
            </div>
    </div>
<?php }
                    
}
}else{ ?>
    <p class="text-danger text-center">ไม่พบข้อมูล</p>
<?php } ?>
    <div class="clearfix"></div>