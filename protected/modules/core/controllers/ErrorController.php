<?php

class ErrorController extends Controller
{
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionIndex()
	{
		$this->layout = false;
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('index', $error);
		}
	}

}