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
class UploadAsset extends AssetBundle {

    public $sourcePath = '@UploadAsset';
    public $css = [
        'css/demo.css',
        'css/jquery-ui.css',
        'css/jquery.fileupload.css',
        'css/jquery.fileupload-ui.css',
    ];
    public $js = [
        'js/tmpl.min.js',
        'js/load-image.all.min.js',
        'js/canvas-to-blob.min.js',
        'js/jquery.blueimp-gallery.min.js',
        'js/jquery.iframe-transport.js',
        'js/jquery.fileupload.js',
        'js/jquery.fileupload-process.js',
        'js/jquery.fileupload-image.js',
        'js/jquery.fileupload-audio.js',
        'js/jquery.fileupload-video.js',
        'js/jquery.fileupload-validate.js',
        'js/jquery.fileupload-ui.js',
        'js/jquery.fileupload-jquery-ui.js',
        'js/main.js',
        
        
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
