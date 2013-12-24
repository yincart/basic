ElFinder 1.x Yii extension
==========================

0. Checkout source code to your project, for example to ext.elFinder
1. Create controller for connector action, and configure it params

        class ElfinderController extends CController
        {
            public function actions()
            {
                return array(
                    'connector' => array(
                        'class' => 'ext.elFinder.ElFinderConnectorAction',
                        'settings' => array(
                            'root' => Yii::getPathOfAlias('webroot') . '/uploads/',
                            'URL' => Yii::app()->baseUrl . '/uploads/',
                            'rootAlias' => 'Home',
                            'mimeDetect' => 'none'
                        )
                    ),
                );
            }
        }

2. ServerFileInput - use this widget to choose file on server using ElFinder pop-up

          $this->widget('ext.elFinder.ServerFileInput', array(
                  'model' => $model,
                  'attribute' => 'serverFile',
                  'connectorRoute' => 'admin/elfinder/connector',
                  )
          );
3. ElFinderWidget use this widget to manage files

          $this->widget('ext.elFinder.ElFinderWidget', array(
                  'connectorRoute' => 'admin/elfinder/connector',
                  )
          );

4. To use TinyMceElFinder see: https://bitbucket.org/z_bodya/yii-tinymce