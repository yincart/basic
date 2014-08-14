<?php

class CaseController extends Controller
{
        public $layout='//layouts/column2';
        
	public function actionIndex()
	{
            $id= $_REQUEST['cate_id'];
            if($id){
                $condition = $id ? 'cate_id ='.$id : '' ;
            }
            $criteria = new CDbCriteria(array(
                'condition'=>$condition,
                'order'=>'sort_order desc'
            ));
            $count=anli::model()->count($criteria);
            $pages=new CPagination($count);

            // results per page
            $pages->pageSize=12;
            $pages->applyLimit($criteria);
            $anli = anli::model()->findAll($criteria);

            $this->render('index', array(
                'case'=>$anli
            ));
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

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/


}