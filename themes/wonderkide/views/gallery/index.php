<?php

use app\components\widgets\Gallery;
use kartik\dialog\Dialog;
 
// widget with default options
echo Dialog::widget([
    
    'libName' => 'krajeeDialogDanger', // a custom lib name
    'options' => [  // customized BootstrapDialog options
        'size' => Dialog::SIZE_SMALL, // large dialog text
        'type' => Dialog::TYPE_DANGER, // bootstrap contextual color
        'title' => 'ผิดพลาด!',
    ]
    
]);
?>

<div class="row">
    <div class="col-md-12">
        <section id="gallery">
            <div class="cat-widget">
                <div class="widget-title">
                            <h3><a href="/gallery">GALLERY</a></h3>
                            <span class="sub-title">อัลบั้มแห่งความทรงจำ</span>

                            <div class="sep-widget-tri"></div>
                            <div class="clearfix"></div>
                </div>
                <div class="row show-gallery-action">
                    
                    <div class="col-md-4">
                        
                        <div class="search-box">
                            <form id="search-gallery-box">
                                    
                                    <div class="input-group">
                                        
                                        <label class="sr-only" for="search">Input text</label>
                                        <input type="text" name="search" class="form-control" id="data-search" placeholder="Search...." value="<?= $search ? $search:'' ?>">
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn glyphicon glyphicon-search"></button>
                                        </span>
                                    </div>
                                <input type="hidden" name="gallery_all" value="<?= $get_all==1 ? 1:-1 ?>" id="gallery_all" />
                                <input type="hidden" name="gallery_me" value="<?= $get_me==1 ? 1:-1 ?>" id="gallery_me" />
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="filter ">
                            <div class="col-sm-6">
                            <div class="roundedTwo1">
                                <input type="checkbox" value="<?= $get_all==1 ? 1:-1 ?>" id="roundedTwo1" <?= $get_all==1 ? "checked":"" ?> />
                                <label class="gallery-filter" to="gallery_all" for="roundedTwo1"></label><span class="text-title"><strong>Gallery ทั้งหมด</strong></span>
                            </div>
                            </div>
                            <div class="col-sm-6">
                            <div class="roundedTwo2">
                                <input type="checkbox" value="<?= $get_me==1 ? 1:-1 ?>" id="roundedTwo2" <?= $get_me==1 ? "checked":"" ?> />
                                <label class="gallery-filter" to="gallery_me" for="roundedTwo2"></label><span class="text-title"><strong>Gallery ส่วนตัว</strong></span>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="action">

                            <a class="btn btn-default" href="<?= Yii::$app->seo->getUrl('gallery/personal') ?>"><span class="glyphicon glyphicon-picture"></span> จัดการ Gallery ส่วนตัว</a>

                        </div>
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="widget-content animated fadeInRight">
                    <?php echo Gallery::widget(['render'=>'gallery-main', 'model'=>$gallery]); ?>
                </div>
            </div>
        </section>
    </div>
</div>