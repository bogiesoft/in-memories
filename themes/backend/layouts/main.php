<?php

use yii\helpers\Html;
use app\assets\BEAsset;

//use app\components\widgets\MenuCH;
//use kartik\growl\Growl;

BEAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode('WONDERKIDE :: BACKEND') ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <header class="container-fluid">
            <!--<a class="logo" title="wonderkide" href="/wonderkide"><img class="img-responsive" alt="wonderkide" src="<?= Yii::$app->assetManager->getPublishedUrl('@BEAsset'); ?>/images/lufi.png"></a>-->
            <?php //echo MenuCH::widget([]) ?>
            
            <?= $this->render('_menu'); ?>
        </header>
        <article>
            <?= $content ?>
        </article>
        <footer class="container-fluid">
            <p>WONDERKIDE :: BACKEND 1.0</p>
        </footer>
        <?php /*foreach (Yii::$app->session->getAllFlashes() as $message):; ?>
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
        <?php endforeach; */?>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
