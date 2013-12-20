<?php

class ThemeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/system';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','set'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Theme;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Theme']))
		{
			$model->attributes=$_POST['Theme'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Theme']))
		{
			$model->attributes=$_POST['Theme'];
			if($model->save())
				$this->redirect(array('admin'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Theme');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Theme('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Theme']))
			$model->attributes=$_GET['Theme'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

    /**
     * Set the theme
     */
    public function actionSet($id)
    {
        $model1=$this->loadModel($id);
        $model2=new Sys_theme();
        //var_dump($model1);exit;
        $cookieDays = 180;
        $cookie = new CHttpCookie('theme', $model1->theme);
        $cookie->expire = time() + 60*60*24*$cookieDays;
        Yii::app()->request->cookies['theme'] = $cookie;
        if(isset($_POST['Sbt']))
        {
            $model2->name=$model1->primaryKey;
            $newTheme=Sys_theme::model()->find('name=?',array($model2->name));
           // var_dump($newTheme);exit;
            if($newTheme!==null)
            {
                $oldTheme=Sys_theme::model()->find('status=?',array("2"));
               // var_dump($oldTheme);exit;
                if($oldTheme!==null&&$oldTheme!==$newTheme)
                {
                    $_oldTheme=Theme::model()->find('theme=?',array($oldTheme->name));
                    $_newTheme=$model1;
                    $oldTheme->status="1";
                    $_oldTheme->desc="";
                    $newTheme->status="2";
                    $_newTheme->desc="Now using!";
                    $oldTheme->save();
                    $_oldTheme->save();
                    $newTheme->save();
                    $_newTheme->save();
                }
            }
            if(isset(Yii::app()->request->cookies['theme']))
            {
                unset(Yii::app()->request->cookies['theme']);
            }
            $this->redirect(array('admin'));
        }
        $this->render('set',array(
            'model'=>$model1,
        ));
    }
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Theme::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='theme-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
