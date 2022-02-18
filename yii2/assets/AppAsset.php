<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'css/site.css',
        '//fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700',
        '//fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700',
        'css/global.css',
        'css/structure.css',
        'css/be_style.css',
        'css/custom.css',
        'css/pager.css',
        'plugins/rs-plugin/css/settings.css',
        'css/cookies.css', 
    ];

    public $js = [
        'js/jquery-2.1.4.min.js',
        'js/mfn.menu.js',
        'js/jquery.plugins.js',
        'js/jquery.jplayer.min.js',
        'js/animations/animations.js',
        'js/email.js',
        'js/scripts.js',
        'plugins/rs-plugin/js/jquery.themepunch.tools.min.js',
        'plugins/rs-plugin/js/jquery.themepunch.revolution.min.js',
        'plugins/rs-plugin/js/extensions/revolution.extension.video.min.js',
        'plugins/rs-plugin/js/extensions/revolution.extension.slideanims.min.js',
        'plugins/rs-plugin/js/extensions/revolution.extension.actions.min.js',
        'plugins/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js',
        'plugins/rs-plugin/js/extensions/revolution.extension.kenburn.min.js',
        'plugins/rs-plugin/js/extensions/revolution.extension.navigation.min.js',
        'plugins/rs-plugin/js/extensions/revolution.extension.migration.min.js',
        'plugins/rs-plugin/js/extensions/revolution.extension.parallax.min.js',
        'js/main.js',
        'js/cookies.js',
    ];
    public $depends = [

        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        // 'yii\bootstrap4\BootstrapAsset',
    ];
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}