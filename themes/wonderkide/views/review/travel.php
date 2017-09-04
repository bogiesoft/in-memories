<?php 
use app\components\widgets\SlideBanner;
use app\components\widgets\Review;
use yii\helpers\Html;

?>
<section class="slide-banner">
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <?php //echo SlideBanner::widget(['message' => ' Yii2.0']) ?>
        </div>
    </div>
</section>
<section class="review-action">
    <?= Html::button('เพิ่ม', ['class' => 'btn btn-info', 'onclick' => 'New()']) ?>
</section>

<div class="clear-float"></div>

<section id="travel-content">
    <?php /*
    <div class="media">
        <div class="media-left">
            <a href="#">
                <img class="media-object" src="..." alt="...">
            </a>
        </div>
        <div class="media-body">
            <h4 class="media-heading">Media heading</h4>
            <span>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span>
                
            
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object" src="..." alt="...">
                        </a>
                    </div>
                    <div class="media-body">
                        <h4 class="media-heading">Media heading</h4>
                        <span>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</span>

                    </div>
                </div>
            
            
        </div>
        
    </div>
     * 
     */?>
    <?php echo Review::widget(['type' => 'travel']) ?>
</section>