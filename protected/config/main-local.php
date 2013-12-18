<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=192.168.1.230;dbname=yincart-basic',
            'emulatePrepare' => true,
            'username' => 'jago',
            'password' => '123456',
            'charset' => 'utf8',
            'tablePrefix' => ''
        )
        )
    );