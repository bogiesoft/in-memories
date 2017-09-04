<?php 
use yii\helpers\Html;
use app\components\helpFunction;

if($model){ 
     foreach ($model as $review) {
         
     ?>
    <div class="review-item-action">
        <!--<label class="glyphicon glyphicon-eye-open"><span class="badge">42</span></label>
        <label class="glyphicon glyphicon-hand-right">1</label>
        <label class="glyphicon glyphicon-star-empty">5</label>-->
        
        <!--<button class="btn btn-info" type="button">
            <span class="glyphicon glyphicon-eye-open">&nbsp;</span><span class="badge">6</span>
        </button>-->
        <!--<button class="btn btn-info" type="button">
            <span class="glyphicon glyphicon-eye-open">&nbsp;</span><span class="badge">6</span>
        </button>-->
        <button class="btn btn-success" type="button">
            <span class="glyphicon glyphicon-comment">&nbsp;</span><span class="badge">8</span>
        </button>
        <button class="btn btn-info" type="button">
            <span class="glyphicon glyphicon-thumbs-up">&nbsp;</span><span class="badge">4</span>
        </button>
        <button class="btn btn-warning" type="button">
            <span class="glyphicon glyphicon-thumbs-down">&nbsp;</span><span class="badge">0</span>
        </button>
    </div>
    <div class="clear-float"></div>

    <div class="media travel">
        <div class="row">
            <div class="col-md-3">
                <div class="media-left">
                    <a href="#">
                        <img class="media-object" src="/uploads/img/review/travel/<?= $review->image ?>" alt="...">
                    </a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="media-body">
                    <h3 class="media-heading"><?= $review->title ?></h3>
                    <div class="travel-detail">
                        <span class="glyphicon glyphicon-time label label-primary"> <?= helpFunction::humanTiming(strtotime($review->update_post)) ?></span>
                        <label class="label label-primary">Rating:
                        <?php $aaa=5;
                            for ($i=1;$i<=$review->rating;$i++) { ?>
                                 <span class="glyphicon glyphicon-star-empty"> </span>
                        <?php } ?>
                        </label>
                    </div>
                    <span><?= helpFunction::cutText($review->content) ?></span>
                    <div class="action">
                        <?= Html::a('Read more', ['/review/view/','model' => $type, 'id' => $review->id_travel]); ?>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="divider"></div>
<?php }

} ?>