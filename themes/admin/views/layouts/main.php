<?php
use yii\helpers\Html;
use app\assets\BEAsset;
use kartik\growl\Growl;
use app\models\MainDataModel;
rmrevin\yii\fontawesome\AssetBundle::register($this);

BEAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang='<?= Yii::$app->language ?>'>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">-->
        <link rel="shortcut icon" href="<?= MainDataModel::getIcon(); ?>" type="image/x-icon" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode('WONDERKIDE :: BACKEND') ?></title>
        <?php $this->head() ?>

    </head>
    <body>
        <?php $this->beginBody() ?>
        <div id="header">
            <!--<a href="/admin"><div id="text-logo">SYSTEM ADMIN VERSION 1.0</div></a>-->
            <?php //if (Yii::app()->user->id) { ?>
                <a href="/wonderkide/auth/logout"><img id="logout" src="<?= Yii::$app->assetManager->getPublishedUrl('@BEAsset'); ?>/images/logout.png" title=" ออกจากระบบ"></a>
            <?php //} ?>      
        </div>
        <div id="main">

            <div id="left-panel">
                <?php include '_menu.php'; ?>
            </div>
            <div id="right-panel">
                <section class="container-fluid content-panel">
                <?php echo $content; ?>
                </section>
            </div>
            <div class="clear"></div>
        </div>
        <div id="footer">Created By wonderkide&trade; @ 2016</div>
        
            <?php //Get all flash messages and loop through them ?>
            <?php foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
                <?php
                echo Growl::widget([
                    'type' => (!empty($message['type'])) ? $message['type'] : 'danger',
                    'title' => (!empty($message['title'])) ? Html::encode($message['title']) : 'Title Not Set!',
                    'icon' => (!empty($message['icon'])) ? $message['icon'] : 'fa fa-info',
                    'body' => (!empty($message['message'])) ? Html::encode($message['message']) : 'Message Not Set!',
                    'showSeparator' => true,
                    'delay' => 1, //This delay is how long before the message shows
                    'pluginOptions' => [
                        'delay' => (!empty($message['duration'])) ? $message['duration'] : 3000, //This delay is how long the message shows for
                        'placement' => [
                            'from' => (!empty($message['positonY'])) ? $message['positonY'] : 'top',
                            'align' => (!empty($message['positonX'])) ? $message['positonX'] : 'right',
                        ]
                    ]
                ]);
                ?>
            <?php endforeach; ?>
        
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>