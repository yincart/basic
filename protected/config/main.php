<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
$frontend = dirname(__FILE__) . DIRECTORY_SEPARATOR . '..';
$backend = $frontend . DIRECTORY_SEPARATOR . '..';
Yii::setPathOfAlias('backend', $backend);
Yii::setPathOfAlias('widgets', $frontend . DIRECTORY_SEPARATOR . 'widgets');
Yii::setPathOfAlias('bootstrap', $frontend . DIRECTORY_SEPARATOR . 'extensions' . DIRECTORY_SEPARATOR . 'bootstrap');
Yii::setPathOfAlias('xupload', $frontend . DIRECTORY_SEPARATOR . 'extensions' . DIRECTORY_SEPARATOR . 'xupload');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.

return array(
    'basePath' => $frontend,
    'name' => 'Yincart演示购物网',
    'language' => 'en',
    'theme' => 'default',
    // preloading 'log' component
    'preload' => array('log', 'translate'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.components.helpers.*',
        'application.modules.cms.models.*',
        'application.modules.mall.models.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.modules.translate.TranslateModule'
    ),
    // path aliases
    'aliases' => array(
        // yiistrap configuration
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change if necessary
        // yiiwheels configuration
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
    ),
    'modules' => array(
        'comments' => array(
            //you may override default config for all connecting models
            'defaultModelConfig' => array(
                //only registered users can post comments
                'registeredOnly' => false,
                'useCaptcha' => false,
                //allow comment tree
                'allowSubcommenting' => true,
                //display comments after moderation
                'premoderate' => false,
                //action for postig comment
                'postCommentAction' => 'comments/comment/postComment',
                //super user condition(display comment list in admin view and automoderate comments)
                'isSuperuser' => 'Yii::app()->user->checkAccess("moderate")',
                //order direction for comments
                'orderComments' => 'DESC',
            ),
            //the models for commenting
            'commentableModels' => array(
                //model with individual settings
                'Article' => array(
                    'registeredOnly' => false,
                    'useCaptcha' => true,
                    'allowSubcommenting' => false,
                    //config for create link to view model page(page with comments)
                    'pageUrl' => array(
                        'route' => 'article/view',
                        'data' => array('id' => 'article_id'),
                    ),
                ),
                //model with default settings
                'ImpressionSet',
            ),
            //config for user models, which is used in application
            'userConfig' => array(
                'class' => 'User',
                'nameProperty' => 'username',
                'emailProperty' => 'email',
            ),
        ),
        // uncomment the following to enable the Gii tool
        'member',
        'translate',
        'cms' => array(
            'class' => 'application.modules.cms.CmsModule'
        ),
        'user' => array(
            'class' => 'application.modules.user.UserModule',
            # encrypting method (php hash function)
            'hash' => 'md5',
            # send activation email
            'sendActivationMail' => true,
            # allow access for non-activated users
            'loginNotActiv' => false,
            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,
            # automatically login from registration
            'autoLogin' => true,
            # registration path
            'registrationUrl' => array('/user/registration'),
            # recovery password path
            'recoveryUrl' => array('/user/recovery'),
            # login form path
            'loginUrl' => array('/user/login'),
            # page after login
            'returnUrl' => array('/user/profile'),
            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
        'mall' => array(
            'class' => 'application.modules.mall.MallModule'
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '123',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array(
                'bootstrap.gii'
            ),
        ),
    ),
    // application components
    'components' => array(
        'seo' => array(
            'class' => 'application.modules.yiiseo.components.SeoExt',
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'class' => 'WebUser',
            'loginUrl' => array('/user/login'),
            'stateKeyPrefix' => 'front_',
        ),
//        'bootstrap' => array(
//            'class' => 'bootstrap.components.Bootstrap',
//            'responsiveCss' => true,
//            'fontAwesomeCss' => true,
////            'enableCdn' => true,
//        ),
        // yiistrap configuration
        'bootstrap' => array(
            'class' => 'bootstrap.components.TbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),
        'cart' => array(
            'class' => 'ext.Cart',
        ),
        'mailer' => array(
            'class' => 'ext.mailer.EMailer',
            'pathViews' => 'application.views.email',
            'pathLayouts' => 'application.views.email.layouts'
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'rules' => array(
                'page/<key:\w+>' => 'page/index',
                'catalog/<key:\w+>' => 'catalog/index',
                'list/<category_id:\d+>' => 'item/index',
                'item-list-<key:\w+>' => 'item/list',
//                        'item-<id:\d+>' => 'item/view',
                'item/<id:\d+>/<title:.*?>' => 'item/view',
                'article/<id:\d+>/<title:.*?>' => 'article/view',
                '<_c:\w+>/<id:\d+>' => '<_c>/view',
                '<_c:\w+>/<_a:\w+>/<id:\d+>' => '<_c>/<_a>',
                '<_c:\w+>/<_a:\w+>' => '<_c>/<_a>',
                '<_m:\w+>/<_c:\w+>/<id:\d+>' => '<_m>/<_c>/view',
                '<_m:\w+>/<_c:\w+>/<_a:\w+>-<id:\d+>' => '<_m>/<_c>/<_a>',
                '<_m:\w+>/<_c:\w+>/<_a:\w+>' => '<_m>/<_c>/<_a>',
            ),
        ),
        
        /* setup message translation method */
        'messages' => array(
            'class' => 'CDbMessageSource',
            'onMissingTranslation' => array('Ei18n', 'missingTranslation'),
            'sourceMessageTable' => 'source_message',
            'translatedMessageTable' => 'message'
        ),
        /* setup global translate application component */
        'translate' => array(
            'class' => 'translate.components.Ei18n',
            'createTranslationTables' => true,
            'connectionID' => 'db',
            'languages' => array(
                'en' => 'English',
                'de' => 'German',
                'zh_cn' => 'Chinese',
                'en_us' => 'America',
                'ru' => 'Russian'
            )
        ),
        'cache' => array(
            'class' => 'system.caching.CFileCache',
        ),
        'settings' => array(
            'class' => 'CmsSettings',
            'cacheComponentId' => 'cache',
            'cacheId' => 'global_website_settings',
            'cacheTime' => 0,
            'tableName' => '{{settings}}',
            'dbComponentId' => 'db',
            'createTable' => true,
            'dbEngine' => 'InnoDB',
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yincart',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'tablePrefix' => ''
        ),
//        'log' => array(
//            'class' => 'CLogRouter',
//            'routes' => array(
//                array(
//                    'class' => 'CFileLogRoute',
////                    'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
////                    'ipFilters' => array('127.0.0.1', '192.168.0.101'),
//                    'levels' => 'error, warning',
//                ),
//            // uncomment the following to show log messages on web pages
////              array(
////              'class'=>'CWebLogRoute',
////              ),
//            ),
//        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
    ),
);