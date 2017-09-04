<?php
use app\components\helpFunction;
use app\components\widgets\LikeBox;
use app\components\widgets\commentBox;
use yii\widgets\LinkPager;
$this->registerCssFile(Yii::$app->assetManager->getPublishedUrl('@WDAsset')."/css/memory.css", [
    'depends' => ['yii\web\YiiAsset','yii\bootstrap\BootstrapAsset'],
]);
?>
<div class="row">
    <div class="col-md-12">
        <div class="memory cat-widget wdg-cat-opposite">
            <div class="widget-title">
                <h3><a href="<?= Yii::$app->seo->getUrl('memory') ?>">MEMORY</a></h3>
                <span class="sub-title"><?= $model->title ?></span>

                <div class="sep-widget-dou"></div>
                <div class="clearfix"></div>
            </div>
            <div class="widget-content">
                <?php
                    echo Yii::$app->controller->renderPartial('_action',['model' => $model]);
                ?>
                <section class="memory-view">
                    <div class="header">
                        <h3 class="text-center"><?= $model->title ?></h3>
                    </div>
                    <div class="content">
                        <?= $model->content ?>
                    </div>
                    <hr class="style18">
                    <div class="memory-view-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="user-detail">
                                    <p>โพสโดย : <?= $username ?></p>
                                    <p>โพสเมื่อ : <?= helpFunction::dateTimeMinute($model->create_time) ?></p>
                                    <?php
                                    if($model->update_time){ ?>
                                    <p class="post-edit">แก้ไขล่าสุดเมื่อ : <?= helpFunction::dateTimeMinute($model->update_time) ?></p>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="memory-action likebox">
                                    <?= LikeBox::widget(['model' => $model, 'cat' => 'memory', 'position' => 'right']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="memory-comment">
                    <?php 
                    if($comment){
                        echo commentBox::widget(['model'=>$comment, 'top_model'=>$top_comment, 'pagination'=>$pages->getPage(), 'title'=>$model->title, 'category'=>'memory', 'id_category'=>$model->id, '_parent'=>null]);
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