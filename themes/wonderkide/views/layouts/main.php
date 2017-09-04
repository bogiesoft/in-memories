<?php


use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use app\assets\WDAsset;
use app\components\widgets\Footer;
use app\models\MainDataModel;
use app\models\MainMenuModel;
rmrevin\yii\fontawesome\AssetBundle::register($this);


AppAsset::register($this);
WDAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?= MainDataModel::getIcon(); ?>" type="image/x-icon" />
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
    <!--<div class='progress' id="progress_div">
        <div class='bar' id='bar1'></div>
        <div class='percent' id='percent1'></div>
    </div>-->
<?php $this->beginBody() ?>
    <header id="manUTD">
        <?php //echo Html::img(Yii::$app->assetManager->getPublishedUrl('@WDAsset').'/images/head-utd.jpg', ['class' => 'img-responsive']) ?>
    </header>
<div class="wrap">
    <?php
    NavBar::begin([
        //No image
        //'brandLabel' => 'WTF', 
        //'brandUrl' => Yii::$app->homeUrl,
        'brandLabel' => MainDataModel::getLogo(),
        'brandOptions' => ['class' => 'home-logo'],//options of the brand
        
        'options' => [
            'class' => 'navbar-inverse',
            'id' => 'mainMenu',
        ],
    ]);
    $navItems=MainMenuModel::getMenu()
        //['label' => '<span class="glyphicon glyphicon-home" id="wonder"></span> Home', 'url' => ['/']],
        
      ;
        /*if (Yii::$app->user->isGuest) {
          array_push($navItems,['label' => 'Sign In', 'url' => [Yii::$app->seo->getUrl('site/login')]],
              ['label' => 'Sign Up', 'url' => [Yii::$app->seo->getUrl('site/signup')]]);
        } else {
          array_push($navItems,
              ['label' => '<span class="glyphicon glyphicon-comment" id="board"></span> Board', 'url' => [Yii::$app->seo->getUrl('board')]],
              //['label' => '<span class="glyphicon glyphicon-book" id="notebook"></span> Notebook', 'url' => ['/wonder/notebook']],
              ['label' => '<span class="glyphicon glyphicon-picture" id="gallery"></span> Gallery', 'url' => [Yii::$app->seo->getUrl('gallery')]],
              ['label' => '<span class="glyphicon glyphicon-user" id="personal"></span> ' . Yii::$app->user->identity->username ,'url' => FALSE,'options' => ['data-toggle' => 'modal','data-target' => '#UserModal','id' => 'modal-user']]
              //['label' => Yii::$app->controller->renderPartial('/layouts/_noti_popup',[]), 'url' => '#']
          );
        }*/
      
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <?= $content ?>
    </div>
</div>

<!--<section class="footer-about">
    <div class="container">
        <?= Footer::widget(); ?>
    </div>
</section>-->

<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="create-by">
                    <!--<p class="center">Powered by :: wonderkide</p>-->
                    <label class="center">Copyright &copy;2016 in-memories.com ALL RIGHTS RESERVED. </label>
                </div>
            </div>
        </div>
    </div>
</footer>
    
<?php
if(Yii::$app->user->isGuest){
    echo $this->render('_sign_modal');
}
?>

<!-- notification show after update caption -->
<div id="notify-access-caption" class="notify-access-caption">
    <div class="box-content">
        <label id="icon-notify"></label>
        <label class="glyphicon glyphicon-remove close-notify"></label>
        <h4 class="title">title</h4>
        <hr class="separeter">
        <p class="content">content</p>
    </div>
</div>
<a href="#" id="back-to-top" title="เลื่อนขึ้นด้านบน"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<input type="hidden" id="nav-data-action" value="<?= Yii::$app->controller->id; ?>">


<!-- value in progress -->
<input type="hidden" id="progress_width" value="0">

<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
