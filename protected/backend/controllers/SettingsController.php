<?php

class SettingsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/system';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('admin'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'list'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'list','ClearFrontend','ClearBackend'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {
        $settings = Yii::app()->settings;
        $model = new SettingsForm();

        if (isset($_POST['SettingsForm'])) {
            $model->setAttributes($_POST['SettingsForm']);
            $settings->deleteCache();
            foreach ($model->attributes as $category => $values) {
                if($category === 'logo')
                {
                    continue;
                }
                $settings->set($category, $values);
            }
            Yii::app()->user->setFlash('success', 'Site settings were updated.');
            $this->refresh();
        }
        foreach ($model->attributes as $category => $values) {
            if($category === 'logo')
                continue;
            $cat = $model->$category;
            foreach ($values as $key => $val) {
                $cat[$key] = $settings->get($category, $key);
            }
            $model->$category = $cat;
        }
        $this->render('index', array('model' => $model));
    }

    public function actionList() {
        $this->render('list');
    }
    public function actionClearBackend() {
        Yii::app()->cache->flush();
        $this->redirect('index');
    }
    public function actionClearFrontend() {
        $local=require('./protected/config/main-local.php');
        $base=require('./protected/config/main.php');
        $config=CMap::mergeArray($base, $local);
        Yii::setApplication(null);
        Yii::createWebApplication($config)->cache->flush();
        $this->redirect('index');
    }
}