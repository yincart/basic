<?php

class SkuController extends BackendController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//	public $layout='//layouts/column2';

    public $content_title = 'Sku列表';

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
//	public function accessRules()
//	{
//		return array(
//			array('allow',  // allow all users to perform 'index' and 'view' actions
//				'actions'=>array('index','view'),
//				'users'=>array('*'),
//			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
//			array('allow', // allow admin user to perform 'admin' and 'delete' actions
//				'actions'=>array('admin','delete'),
//				'users'=>array('admin'),
//			),
//			array('deny',  // deny all users
//				'users'=>array('*'),
//			),
//		);
//	}

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
		$model=new Sku;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sku']))
		{
			$model->attributes=$_POST['Sku'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->sku_id));
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

		if(Yii::app()->request->isPostRequest) {
            $this->handleImageData($model);
			$model->attributes=$_POST['Sku'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->sku_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

    /**
     * @param $model Sku
     */
    public function handleImageData($model)
    {
        if (isset($_POST['ItemImg']['pic']) && isset($_POST['ItemImg']['item_img_id']) && is_array($_POST['ItemImg']['pic']) && is_array($_POST['ItemImg']['item_img_id'])) {
            $pics = $_POST['ItemImg']['pic'];
            $ids = $_POST['ItemImg']['item_img_id'];
            if ($count = count($pics) === count($ids)) {
                $itemImgs = array();
                for ($i = 0, $count = count($pics); $i < $count; $i++) {
                    $itemImgs[] = array(
                        'item_img_id' => $ids[$i],
                        'item_id' => $model->item_id,
                        'pic' => $pics[$i],
                        'position' => $i,
                    );
                }
                unset($_POST['ItemImg']);
                $_POST['Sku']['skuImgs'] = $itemImgs;
            }
        }
        if (!isset($_POST['Sku']['skuImgs'])) {
            $_POST['Sku']['skuImgs'] = [];
        }
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Sku');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sku('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sku']))
			$model->attributes=$_GET['Sku'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sku the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sku::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sku $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sku-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
