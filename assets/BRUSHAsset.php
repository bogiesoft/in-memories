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
class BRUSHAsset extends AssetBundle {

    public $sourcePath = '@BRUSHAsset';
    public $css = [
        //'css/bootstrap.min.css',
        'css/main.css',
        'css/supersized.css',
        'css/supersized.shutter.css',
        'css/fancybox/jquery.fancybox.css',
        'css/fonts.css',
        'css/shortcodes.css',
        'css/bootstrap-responsive.min.css',
        'css/responsive.css',
        'css/style-update.css',
    ];
    public $js = [
        //'js/bootstrap.min.js',
        'js/modernizr.js',
        'js/supersized.3.2.7.min.js',
        'js/waypoints.js',
        'js/waypoints-sticky.js',
        'js/jquery.isotope.js',
        'js/jquery.fancybox.pack.js',
        'js/jquery.fancybox-media.js',
        'js/jquery.tweet.js',
        'js/plugins.js',
        'js/main.js',
        'js/bootbox.min.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );

    public function init() {
        $this->publishOptions['forceCopy'] = (YII_ENV == 'dev') ? TRUE : FALSE;
        parent::init();
    }

}
