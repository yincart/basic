<?php
/**
 * YController is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
 */
class YController extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/siderbar.php'.
     */
    public $layout = '//layouts/main';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function init() {
        parent::init();
        Yii::import('ext.ThemePicker.EThemePicker');
        EThemePicker::setTheme();
        Yii::app()->params['title'] = Yii::app()->name;

        $controller = Yii::app()->controller;
       if(!file_exists('install_lock.txt')){
           if(!($controller instanceof InstallController)){
               $this->redirect('install/install');
           }
        }
    }

    public function afterAction($action)
    {
        
    }
}