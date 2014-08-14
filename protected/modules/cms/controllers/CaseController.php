<?php

class CaseController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/cms';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
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
                'users'=>array('admin'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update'),
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
		$model=new anli;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['anli']))
		{
			$model->attributes=$_POST['anli'];
                         $img = CUploadedFile::getInstance($model, 'image');
                        if($img){
                        if($img->size > 2000000){
                            $img_size = ($img->size)/1000;
                           echo '<script>alert("图片大小为'.$img_size.'KB,请小于2M")</script>';
                        }else{
                        $extensionName = explode('.', $img->getName());
                        $extensionName = $extensionName[count($extensionName) - 1];

                        $day_file = date('Y-m-d', time());
                        $path = dirname(Yii::app()->basePath) . '/upload/case';
                        CommonFunction::do_mkdir($day_file, $path);
                        $time_path = date('Y',time()).'/'.date('m',time()).'/'.date('d',time()).'-';
                        $dir = dirname(Yii::app()->basePath) . '/upload/case/'.$time_path;
                        $img_src = $dir. md5(time()) .'.'. $extensionName;
                        $img1 = md5(time()) .'.'. $extensionName;
                        $model->image = $time_path.$img1;
                        }}else{
                           echo '<script>alert("请上传图片.")</script>';
                        }

			if($model->save()){
                                //$model->default_image->saveAs(dirname(Yii::app()->basePath) .'/upload/caigou/'.$model->default_image,true);
                            $img -> saveAs($img_src);
				$this->redirect(array('/admin/case/admin'));
                        }
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

		if(isset($_POST['anli']))
		{
			$model->attributes=$_POST['anli'];
                        $anli = anli::model()->findByPk($id);
                        $img = $_FILES['anli']['name']['image'];
                        if($img !== ''){
                        $img = CUploadedFile::getInstance($model, 'image');
                        $extensionName = explode('.', $img->getName());
                        $extensionName = $extensionName[count($extensionName) - 1];

                        $day_file = date('Y-m-d', time());
                        $path = dirname(Yii::app()->basePath) . '/upload/case';
                        CommonFunction::do_mkdir($day_file, $path);
                        $time_path = date('Y',time()).'/'.date('m',time()).'/'.date('d',time()).'-';
                        $dir = dirname(Yii::app()->basePath) . '/upload/case/'.$time_path;
                        $img_src = $dir. md5(time()) .'.'. $extensionName;
                        $img1 = md5(time()) .'.'. $extensionName;
                        $model->image = $time_path.$img1;
                        }else{
                        $model->image = $anli->image;
                        }

                        //$model->cate_id = $_POST['Caigou']['cate_id'];
			if($model->save()){
                            if($img !== ''){
                            @unlink(dirname(Yii::app()->basePath).'/upload/case/'.$anli->image);
                            //$model->default_image->saveAs(dirname(Yii::app()->basePath) .'/upload/caigou/'.$pic_name,true);
                            $img -> saveAs($img_src);
                            }
		            $this->redirect(array('/admin/case/admin'));
                        }
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
		$dataProvider=new CActiveDataProvider('anli');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new anli('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['anli']))
			$model->attributes=$_GET['anli'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=anli::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='anli-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
