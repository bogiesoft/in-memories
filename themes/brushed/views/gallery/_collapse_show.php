<?php
use app\models\GalleryImagesModel;
?>
<!-- Filter Controls - Simple Mode -->
        <div class="row">
            <!-- A basic setup of simple mode filter controls, all you have to do is use data-filter="all"
            for an unfiltered gallery and then the values of your categories to filter between them -->
            <ul class="simplefilter">
                Gallery : 
                <li class="active" data-filter="all">All</li>
                <?php
                foreach ($gallery as $value) { 
                    if(GalleryImagesModel::getImageFirst($value->id)){
                ?>
                        <li data-filter="<?= $value->id ?>"><?= $value->name ?></li>
                <?php }}
                
                /*
                <li data-filter="1">Cityscape</li>
                <li data-filter="2">Landscape</li>
                <li data-filter="3">Industrial</li>
                <li data-filter="4">Daylight</li>
                <li data-filter="5">Nightscape</li>
                <li data-filter="8">test</li>
                 * 
                 */?>
            </ul>
        </div>
<div class="row">
            <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
            attribute, which starts from the value 1 and goes up from there -->
            <div class="filtr-container">
                <?php
                foreach ($gallery as $value) {
                    $images = GalleryImagesModel::getImageFirst($value->id);
                    if($images){ ?>
                        <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="<?= $value->id ?>" data-sort="Busy streets" data-selected="<?= $value->ref ?>">
                            <img class="img-responsive" src="<?= $images ?>" alt="sample image">
                            <span class="item-desc"><?= $value->title ?></span>
                        </div>
                    <?php }
                    
                } ?>
                <?php /*
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="1, 5" data-sort="Busy streets">
                    <img slug="wtf" class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/city_1.jpg" alt="sample image">
                    <span class="item-desc">Busy Streets</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="2, 5" data-sort="Luminous night">
                    <img class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/nature_2.jpg" alt="sample image">
                    <span class="item-desc">Luminous night</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="1, 4" data-sort="City wonders">
                    <img class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/city_3.jpg" alt="sample image">
                    <span class="item-desc">city wonders</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="3" data-sort="In production">
                    <img class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/industrial_1.jpg" alt="sample image">
                    <span class="item-desc">in production</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="3, 4" data-sort="Industrial site">
                    <img class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/industrial_2.jpg" alt="sample image">
                    <span class="item-desc">industrial site</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="2, 4" data-sort="Peaceful lake">
                    <img class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/nature_1.jpg" alt="sample image">
                    <span class="item-desc">peaceful lake</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="1, 5" data-sort="City lights">
                    <img class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/city_2.jpg" alt="sample image">
                    <span class="item-desc">city lights</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="2, 4" data-sort="Dreamhouse">
                    <img class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/nature_3.jpg" alt="sample image">
                    <span class="item-desc">dreamhouse</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="3" data-sort="Restless machines">
                    <img class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/industrial_3.jpg" alt="sample image">
                    <span class="item-desc">restless machines</span>
                </div>
                <div class="col-xs-6 col-sm-4 col-md-3 filtr-item" data-category="8" data-sort="Restless machines">
                    <img class="img-responsive" src="<?= Yii::$app->assetManager->getPublishedUrl('@WDAsset'); ?>/filterizr/img/industrial_3.jpg" alt="sample image">
                    <span class="item-desc">restless machines</span>
                </div>
                 * 
                 */?>
            </div>
        </div>