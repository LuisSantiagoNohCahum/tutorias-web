<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    /* public $sourcePath = '@frontend/themes/main'; */
    public $css = [
        'css/site.css',
        /* 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css',
        'https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap',
        'https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700',
        'https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic',
        'https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css',
        'css/styles.css' */
    ];
    public $js = [
        /* 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js',
        'js/scripts.js',
        'https://cdn.startbootstrap.com/sb-forms-latest.js' */
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
    ];
}
