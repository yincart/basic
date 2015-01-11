<?php

class DefaultController extends Controller
{
//	public function filters()
//	{
//		return array(
//			array('auth.filters.AuthFilter')
//		);
//	}

	public function actionIndex()
	{
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	public function actionLogin()
	{
		$this->layout = false;
		if (Yii::app()->user->isGuest) {
			$model=new UserLogin;
			// collect user input data

			if(isset($_POST['UserLogin']))
			{
				$model->attributes=$_POST['UserLogin'];
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					$this->lastViset();
					if (Yii::app()->getBaseUrl()."/index.php" === Yii::app()->user->returnUrl)
						$this->redirect(Yii::app()->controller->module->returnUrl);
					else
						$this->redirect(Yii::app()->user->returnUrl);
//					$this->redirect(array('/core/default/index'));
				} else {
					print_r($model->errors);
				}
			}
			// display the login form
			$this->render('login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}

	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit_at = date('Y-m-d H:i:s');
		$lastVisit->save();
	}

	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('/core/default/login'));
	}

}