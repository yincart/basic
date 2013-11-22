<?php
/**
 * @see CPortlet
 */
Yii::import('zii.widgets.CPortlet');
 /**
  * This is a simple portlet to choose theme
  * in controller::init() put 
  * @example
  * <pre>
  * Yii::import('ext.themepicker.EThemePicker'); 
  * EThemePicker::setTheme();
  * </pre>
  * @author David Constantine Kurushin <diavolonok@gmail.com>
  *
  */
class EThemePicker extends CPortlet
{
	/**
	 * @var string a title for the widget
	 */
    public $title = 'Theme Picker';
    /**
     * 
     * @var string the default tag name of the container
     */
    public $tagName = 'div';
    /**
     * @var array some html options for the dropdownlist
     */
 	public $dropDownOptions = array(
 		'submit'=>'',
 		'csrf'=>true, 
 		'class'=>'themeSelector' , 
 		'id'=>'themeSelector',
 	);
 	/**
 	 * (non-PHPdoc)
 	 * @see CPortlet::renderContent()
 	 */
    protected function renderContent()
    {
      $themesList = array_combine(Yii::app()->themeManager->themeNames, Yii::app()->themeManager->themeNames);
      echo CHtml::form('', 'post', array());
      echo CHtml::dropDownList('themeSelector' , Yii::app()->theme->name, $themesList, $this->dropDownOptions);
      echo CHtml::endForm();
    }
    /**
     * set the theme and save on cookie, or select from cookie
     * this should be called from  CController::init or CController::beforeAction etc.
     * @see CController::init() 
     * @see CController::beforeAction()
     * @param $cookieDays integer the amount of days the theme choice will be saved, default 180 days
     */
    public static function setTheme($cookieDays = 180){
    	if(Yii::app()->request->getPost('themeSelector') !== null && in_array($_POST['themeSelector'], Yii::app()->themeManager->themeNames, true)){
      		Yii::app()->theme = $_POST['themeSelector'];
      		$cookie = new CHttpCookie('theme', $_POST['themeSelector']);
			$cookie->expire = time() + 60*60*24*$cookieDays; 
      		Yii::app()->request->cookies['theme'] = $cookie;
    	}else if(isset(Yii::app()->request->cookies['theme']) && in_array(Yii::app()->request->cookies['theme']->value, Yii::app()->themeManager->themeNames, true) ){
    		Yii::app()->theme = Yii::app()->request->cookies['theme']->value;
    	}else if(isset(Yii::app()->request->cookies['theme'])){
    		//if we came to this point, the theme don't exists, so we better unset the cookie
    		unset(Yii::app()->request->cookies['theme']);
    		throw new CHttpException(400, Yii::t('app', 'Invalid request. Theme don\'t exist!'));
    	}
    }
}