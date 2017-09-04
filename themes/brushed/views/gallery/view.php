<?php
$items = [];
foreach ($imageModel as $value) {
    array_push($items, [
        'url' => $value->path.$value->real_name, //original
        'src' => $value->path.'thumbnail/'.$value->real_name, //thumb
        'options' => array('title' => $value->title),//title
    ]); 
    
}
use app\components\widgets\LikeBox;
use app\components\widgets\commentBox;
use app\components\helpFunction;
use app\models\ContentModel;
use yii\widgets\LinkPager;
?>
<section id="memory-view" class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="memory cat-widget">
                    <div class="widget-title">
                                <h4><a href="<?= Yii::$app->seo->getUrl('gallery') ?>">GALLERY</a></h4>
                                <span class="sub-title"><?= $gallery->name ?></span>

                                <div class="sep-widget-dou"></div>
                                <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <?php
                        if($gallery->banned == 1){ 
                            $content = ContentModel::findOne(['type'=>'alert-banned']);
                        ?>
                            <div class="alert alert-warning text-center" role="alert"><span class="<?= $content->name ?>"></span> <?= $content->content ?> <a href="<?= Yii::$app->seo->getUrl('personal/sent') ?>?to=1">Click!</a></div>
                        <?php } ?>
                            
                            <div class="accordion-inner gallery-detail-header">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="gallery-detail-user">

                                            <label>แกลอรี่ : <span><?= $gallery->name ?></span></label><br>
                                            <label>โดย : <a href="<?= Yii::$app->seo->getUrl('wonder/user') ?>/<?= $user->id ?>"><span><?php if($user->nickname != null){ echo $user->nickname;}else{echo $user->username;} ?></span></a></label><br>
                                            <label>สร้างเมื่อ : <span><?= helpFunction::dateTime($gallery->create_date) ?></span></label>

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="gallery-action likebox">
                                        <?= LikeBox::widget(['model' => $gallery, 'cat' => 'gallery', 'position' => 'right']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="reply-comment">
                                <?php
                                    echo Yii::$app->controller->renderPartial('_action',['model' => $gallery]);
                                ?>
                            </div>
                            <div class="accordion-inner">
                                <div class="gallery-image">
                                    <?php
                                    echo dosamigos\gallery\Gallery::widget([
                                        'items' => $items,
                                        'id' => 'slide-gallery'
                                    ]);
                                    ?>
                                </div>

                            </div>
                            <section class="gallery-comment">
                                <?php 
                                if($comment){
                                    echo commentBox::widget(['model'=>$comment, 'top_model'=>$top_comment, 'pagination'=>$pages->getPage(), 'title'=>$gallery->name, 'category'=>'gallery', 'id_category'=>$gallery->id, '_parent'=>null]);
                                }else{ ?>
                                <!--<label class="text-center text-danger">ยังไม่มีคอมเม้นต์</label>-->
                                <?php } ?>
                                <?php
                                // display pagination
                                echo LinkPager::widget([
                                    'pagination' => $pages,
                                ]); ?>

                            </section>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>
<?php
$js = <<< JS
$('#slide-gallery a').on("click", function(e) {
    setTimeout(function(){
        if($('#blueimp-gallery').hasClass("blueimp-gallery-display")){
            $('header .sticky-nav').css('z-index', 99);
        }
    }, 100);
});
$(document).on("click", function(e) {
    if($('#blueimp-gallery').hasClass("blueimp-gallery-display")){
    }
    else{
        $('header .sticky-nav').css('z-index', 1001);
    }
});

JS;
 
// register your javascript
$this->registerJs($js);