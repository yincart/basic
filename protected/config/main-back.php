<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
$configDir = dirname(__FILE__);
$frontend = dirname($configDir); //Protected folder
$rootDir = dirname($frontend); //Project entry == basePath in Basic Version
$extDir = $frontend . DIRECTORY_SEPARATOR . 'extensions';
// Xupload configuration
Yii::setPathOfAlias('xupload', $extDir . DIRECTORY_SEPARATOR . 'xupload'); // Change if necessary
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => $frontend,
    'name' => '后台管理系统',

    'language' => 'zh_cn',
    'sourceLanguage'=>'en_us',
    'theme' => 'backend',
    'defaultController' => 'core',
//    'controllerPath' => $frontend . '/controllers',
//    'viewPath' => $frontend . '/views',
//    'runtimePath' => $frontend . '/runtime',
    // preloading 'log' component
    'preload' => array('log', 'bootstrap'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.core.models.*',
        'application.modules.core.components.*',
        'application.modules.marketplace.models.*',
        'application.modules.catalog.models.*',
        'application.modules.payment.models.*',
        'application.modules.review.models.*',
        'application.modules.sale.models.*',
        'application.modules.shipping.models.*',
        'application.modules.review.models.*',
        'application.modules.blog.models.*',
        'bootstrap.helpers.TbHtml',
    ),
    // path aliases
    'aliases' => array(
        // yiistrap configuration
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change if necessary
        // yiiwheels configuration
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'auth' => array(
            'class' => 'application.modules.auth.AuthModule', // Path to module in backend.
            'strictMode' => true, // when enabled authorization items cannot be assigned children of the same type.
            'userClass' => 'User', // the name of the user model class.
            'userIdColumn' => 'id', // the name of the user id column.
            'userNameColumn' => 'username', // the name of the user name column.
//            'defaultLayout' => 'application.views.layouts.main', // the layout used by the module.
            'viewDir' => null, // the path to view files to use with this module.
        ),
        // uncomment the following to enable the Gii tool
        'cms' => array(
            'class' => 'application.modules.cms.CmsModule',
        ),
        'user' => array(
            'class' => 'application.modules.user.UserModule',
        ),
        'plugin' => array(
            'class' => 'application.modules.plugin.PluginModule',
            'pluginRoot' => 'application.plugin', # 插件目录，默认为 application.plugin
            // 'layout' => ''		# 后台插件管理页面主layout文件,默认为 //layouts/main
        ),
        'core' => array(
            'class' => 'application.modules.core.CoreModule',
        ),
        'marketplace' => array(
            'class' => 'application.modules.marketplace.MarketplaceModule',
        ),
        'catalog' => array(
            'class' => 'application.modules.catalog.CatalogModule',
        ),
        'marketing' => array(
            'class' => 'application.modules.marketing.MarketingModule',
        ),
        'payment' => array(
            'class' => 'application.modules.payment.PaymentModule',
        ),
        'sale' => array(
            'class' => 'application.modules.sale.SaleModule',
        ),
        'shipping' => array(
            'class' => 'application.modules.shipping.ShippingModule',
        ),
        'review' => array(
            'class' => 'application.modules.review.ReviewModule',
        ),
    ),
    // application components
    'components' => array(
        'request' => array(
            'enableCsrfValidation' => true,
            'enableCookieValidation' => true,
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl' => array('/core/default/login'),
            'stateKeyPrefix' => 'back_',
            'class' => 'auth.components.AuthWebUser',
            'admins' => array('admin'), // users with full access
        ),
//        'themeManager' => array(
//            'basePath' => $root . '/themes',
//        ),
        // uncomment the following to enable URLs in path-format
        'authManager' => array(
            'class' => 'CDbAuthManager', // Provides support authorization item sorting.
            'connectionID' => 'db',
            'itemTable' => '{{authitem}}',
            'itemChildTable' => '{{authitemchild}}',
            'assignmentTable' => '{{authassignment}}',
            'behaviors' => array(
                'auth' => array(
                    'class' => 'auth.components.AuthBehavior',
                ),
            ),
        ),
        // uncomment the following to enable URLs in path-format
//        'urlManager' => array(
//            'urlFormat' => 'path',
//            'showScriptName' => false,
//            'rules' => array(
//                '<_c:\w+>/<id:\d+>' => '<_c>/view',
//                '<_c:\w+>/<_a:\w+>/<id:\d+>' => '<_c>/<_a>',
//                '<_c:\w+>/<_a:\w+>' => '<_c>/<_a>',
//            ),
//        ),
        'cache' => array(
            'class' => 'system.caching.CFileCache',
        ),
        'settings' => array(
            'class' => 'frontend.extensions.CmsSettings',
            'cacheComponentId' => 'cache',
            'cacheId' => 'global_website_settings',
            'cacheTime' => 0,
            'tableName' => '{{settings}}',
            'dbComponentId' => 'db',
            'createTable' => true,
            'dbEngine' => 'InnoDB',
        ),
//        'bootstrap' => array(
//            'class' => 'bootstrap.components.Bootstrap',
//            'responsiveCss' => true,
//            'fontAwesomeCss' => true,
////            'enableCdn' => true,
//        ),
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),
        'plugin' => array(
            'class' => 'application.modules.plugin.components.HookRender', # HookRender 文件目录
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'core/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
                // uncomment the following to show log messages on web pages
//                array(
//                    'class' => 'CWebLogRoute',
//                    'showInFireBug' => true,
//                ),
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);