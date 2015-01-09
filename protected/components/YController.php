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


        if(isset($_GET['lang'])&&$_GET['lang']!=""){                    //當點擊轉換語言時  
            Yii::app()->user->setState("language",$_GET['lang']);            //相當於與設置一個cookie  
            Yii::app()->language = Yii::app()->user->getState("language");    //轉換成相應的記錄語言  
        }

        if(Yii::app()->user->getState("language")){                      //如果設置了有session記錄  
            Yii::app()->language = Yii::app()->user->getState("language");    //轉換成相應的記錄語言  
        }else {
            Yii::app()->user->setState("language", "en_us");              //沒有session則設置一個session.默認語言為en_us
            Yii::app()->language = Yii::app()->user->getState("language"); //轉換成相應的記錄語言
        }

    }

//    public function actionSetLanguage ($language,$redirect)
//    {
//        Yii::app()->setLanguage($language);
//        $this->redirect($redirect);
//    }
//
//    public function createUrl($route, $params = array(), $ampersand = '&') {
//        return parent::createUrl($route, array_merge(
//            array('lang' => Yii::app()->language), $params
//        ), $ampersand);
//    }


    public function afterAction($action)
    {
        
    }
}