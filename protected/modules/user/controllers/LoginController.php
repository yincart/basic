<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
     //  print_r(Yii::app()->controller->module);exit;
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
				}
			}
			// display the login form
			$this->render('//user/login',array('model'=>$model));
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);
	}
	
	private function lastViset() {
		$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
		$lastVisit->lastvisit_at = date('Y-m-d H:i:s');
		$lastVisit->save();
	}

    public  function  actionLlogin()
    {
        //  print_r(Yii::app()->controller->module);exit;
        $username = $_REQUEST["username"];
        $password = $_REQUEST["password"];
        // collect user input data
        if(isset($_REQUEST["username"])&&isset($_REQUEST["password"]))
        {
            $model=new UserLogin;
            $model->username = $username;
            $model->password = $password;
            // validate user input and redirect to previous page if valid
            if($model->validate()) {
                $this->lastViset();
                echo json_encode(array('status'=>'login'));
            }
            else
            {
                echo json_encode(array('status'=>'notlogin'));
            }
        }
    }

}