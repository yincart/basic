<?php
/**
 * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
 */

class ElfinderController extends Controller
{
    public $layout = '//layouts/mall';

    public function actions()
    {
        return array(
            'connector' => array(
                'class' => 'ext.elFinder.ElFinderConnectorAction',
                'settings' => array(
                    'roots' => array(
                        array(
                            'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
                            'path' => Yii::getPathOfAlias('webroot') . '/upload/', // path to files (REQUIRED)
                            'URL' =>  Yii::app()->baseUrl . '/upload/', // URL to files (REQUIRED)
                            'mimeDetect' => 'internal',
                            'rootAlias' => 'Home',
                            'accessControl' => 'access' // disable and hide dot starting files (OPTIONAL)
                        )
                    )
                )
            ),
        );
    }

    public function actionAdmin()
    {
        $this->render('admin');
    }

    public function actionView()
    {
        $this->renderPartial('view', array(), false, true);
    }
}