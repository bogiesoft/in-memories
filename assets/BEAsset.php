<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author wonderkide
 * @since 2.0
 */

class BEAsset extends AssetBundle {

    public $sourcePath = '@BEAsset';
    public $css = [
        'css/style.css',
        
        'css/main.css',
        'css/menu.css',
        //'css/form.css',
    ];
    public $js = [
        //'js/backend.js',
        'js/be_main.js',
        'js/menu.js',
        //'js/jwplayer.js',
        //'js/flowplayer/flowplayer-3.2.13.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init() {
        $this->publishOptions['forceCopy'] = (YII_ENV == 'dev') ? TRUE : FALSE;
        parent::init();
    }

}
