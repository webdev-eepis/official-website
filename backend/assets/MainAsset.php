<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MainAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'static/bootstrap/css/bootstrap.min.css',
		'static/font-awesome/css/font-awesome.min.css',
        'static/ionicons/css/ionicons.min.css',
        'static/css/morris/morris.css',
        'static/css/jvectormap/jquery-jvectormap-1.2.2.css',
        'static/css/datepicker/datepicker3.css',
        'static/css/daterangepicker/daterangepicker-bs3.css',
        'static/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'static/css/AdminLTE.css',
        'css/site.css',
    ];
    public $js = [
		
		'static/js/jquery-ui.min.js',
		'static/js/bootstrap.min.js',
        'static/js/raphael-min.js',
        'static/js/plugins/sparkline/jquery.sparkline.min.js',
        'static/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
        'static/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
        'static/js/plugins/jqueryKnob/jquery.knob.js',
        'static/js/plugins/daterangepicker/daterangepicker.js',
        'static/js/plugins/datepicker/bootstrap-datepicker.js',
        'static/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
        'static/js/plugins/iCheck/icheck.min.js',
        'static/js/AdminLTE/app.js',
        'static/js/AdminLTE/dashboard.js',
        'static/js/AdminLTE/demo.js',
	
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
