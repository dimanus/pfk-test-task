<?php
define('YII_ENV', 'test');
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_APP_BASE_PATH') or define('YII_APP_BASE_PATH', (dirname(__DIR__)));

require_once YII_APP_BASE_PATH . '/vendor/autoload.php';
require_once YII_APP_BASE_PATH . '/vendor/yiisoft/yii2/Yii.php';

$config = require(YII_APP_BASE_PATH.'/config/web.php');
(new yii\web\Application($config));
