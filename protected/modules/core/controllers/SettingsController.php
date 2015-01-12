<?php

class SettingsController extends BackendController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/content';
    public $content_title = '配置管理';

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