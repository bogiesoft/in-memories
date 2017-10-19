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

class GENAsset extends AssetBundle {

    public $sourcePath = '@GENAsset';
    public $css = [
        //'vendors/bootstrap/dist/css/bootstrap.min.css',
        'vendors/font-awesome/css/font-awesome.min.css',
        'vendors/nprogress/nprogress.css',
        'vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
        'vendors/bootstrap-daterangepicker/daterangepicker.css',
        'build/css/custom.min.css',
        'css/style.css',
        //'',
        //'',
    ];
    public $js = [
        //'vendors/jquery/dist/jquery.min.js',
        'vendors/bootstrap/dist/js/bootstrap.min.js',
        'vendors/fastclick/lib/fastclick.js',
        'vendors/nprogress/nprogress.js',
        'vendors/bootstrap-progressbar/bootstrap-progressbar.min.js',
        'vendors/DateJS/build/date.js',
        'vendors/moment/min/moment.min.js',
        'vendors/bootstrap-daterangepicker/daterangepicker.js',
        'build/js/custom.min.js',
        'js/be_main.js',
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
