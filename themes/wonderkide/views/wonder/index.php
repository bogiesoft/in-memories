<?php

use yii\widgets\ActiveForm;
use app\components\widgets\TapsSign;
use app\components\widgets\Alert;
use app\components\widgets\Gallery;
use app\components\widgets\memoryBox;
use kartik\widgets\DatePicker;
use app\components\MyController;
?>
<div class="row">
    <div class="col-md-12">
        <section class="memo">
            <div class="gallery cat-widget animated fadeIn">
                <div class="widget-title">
                            <h3><a href="<?= Yii::$app->seo->getUrl('gallery') ?>">GALLERY</a></h3>
                            <span class="sub-title">ภาพความทรงจำ</span>

                            <div class="sep-widget-tri"></div>
                            <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                    <?php echo Gallery::widget(['render'=>'index']); ?>
                </div>
                
            </div>
            
            <div class="memory cat-widget wdg-cat-opposite animated fadeIn">
                <div class="widget-title">
                            <h3><a href="<?= Yii::$app->seo->getUrl('memory') ?>">MEMORY</a></h3>
                            <span class="sub-title">กล่องความทรงจำ</span>

                            <div class="sep-widget-tri"></div>
                            <div class="clearfix"></div>
                </div>
                <?php echo memoryBox::widget(['render'=>'index']); ?>
                
            </div>
            
        </section>
            
    </div>
</div>