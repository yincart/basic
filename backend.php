<?php
date_default_timezone_set('Asia/Shanghai');
error_reporting(E_ALL & ~(E_STRICT | E_NOTICE));
// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
$local=require('./protected/config/main-local.php');
$base=require('./protected/backend/config/main.php');
$config=CMap::mergeArray($base, $local);
Yii::createWebApplication($config)->run();