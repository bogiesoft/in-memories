<?php

use app\components\widgets\memoryBox;

?>
<div class="row">
    <div class="col-md-12">
        <div class="main-memory-action">
            
        </div>
        <div class="memory cat-widget wdg-cat-opposite">
                <div class="widget-title">
                            <h3><a href="<?= Yii::$app->seo->getUrl('memory') ?>">MEMORY</a></h3>
                            <span class="sub-title">กล่องความทรงจำ</span>

                            <div class="sep-widget-tri"></div>
                            <div class="clearfix"></div>
                </div>
                <?php echo memoryBox::widget(['render'=>'memory']); ?>
                
        </div>
    </div>
</div>