<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=yincart-basic',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => 'vps123',
            'charset' => 'utf8',
            'tablePrefix' => ''
        )
        )
    );