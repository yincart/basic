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
                'class' => 'ext.yii-elFinder.ElFinderConnectorAction',
                'settings' => array(
                    'root' => Yii::getPathOfAlias('webroot') . '/upload/',
                    'URL' => Yii::app()->baseUrl . '/upload/',
                    'rootAlias' => 'Home',
                    'mimeDetect' => 'none'
                )
            ),
        );
    }

    public function actionAdmin()
    {
        $this->render('admin');
    }
}