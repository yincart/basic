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
        'prompt'=>'Select',
 	);
 	/**
 	 * (non-PHPdoc)
 	 * @see CPortlet::renderContent()
 	 */
    protected function renderContent()
    {
      echo CHtml::form('', 'post', array());
      echo CHtml::dropDownList('themeSelector' , 'id', SysTheme::model()->getList(), $this->dropDownOptions);
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
    	if(Yii::app()->request->getPost('themeSelector') !== null ){
            $model=new SysTheme();
      		$model->id = $_POST['themeSelector'];
            $theme=$model->find('id=?',array($model->id));//find out the theme from sys_theme table
            Yii::app()->theme=$theme->name;
      		$cookie = new CHttpCookie('theme', $theme->name);
			$cookie->expire = time() + 60*60*24*$cookieDays; 
      		Yii::app()->request->cookies['theme'] = $cookie;
    	}else if(isset(Yii::app()->request->cookies['theme']) && in_array(Yii::app()->request->cookies['theme']->value, SysTheme::model()->getList(), true) ){
            Yii::app()->theme = Yii::app()->request->cookies['theme']->value;
    	}else if(isset(Yii::app()->request->cookies['theme'])){
            $arr=explode('"',Yii::app()->request->cookies['theme']->value);
            if(in_array($arr[1], SysTheme::model()->getList(), true) )
            {
                Yii::app()->theme = $arr[1];
            }else
            {
                //if we came to this point, the theme don't exists, so we better unset the cookie
                unset(Yii::app()->request->cookies['theme']);
                throw new CHttpException(400, Yii::t('app', 'Invalid request. Theme don\'t exist!'));
            }
    	}else
        {
            $theme=SysTheme::model()->find('status=?',array( '2')); //set the theme which system set for user
            if($theme!==null)
            {
                Yii::app()->theme=$theme->name;
            }else
            {
                Yii::app()->theme="default";
                throw new CHttpException(400, Yii::t('app', 'The theme system set for us doesn\'t exist!'));
            }
        }
    }
}