<?php
/**
* Comment controller class file.
*
* @author Dmitry Zasjadko <segoddnja@gmail.com>
* @link https://github.com/segoddnja/ECommentable
* @version 1.0
* @package Comments module
* 
*/
class CommentController extends Controller
{
        public $defaultAction = 'admin';
    
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
                        'ajaxOnly + PostComment, Delete, Approve',
		);
	}
        
        /**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
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
			array('allow',
				'actions'=>array('postComment', 'captcha'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('admin', 'delete', 'approve'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Deletes a particular model.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		// we only allow deletion via POST request
                $result = array('deletedID' => $id);
                if($this->loadModel($id)->setDeleted())
                    $result['code'] = 'success';
                else 
                    $result['code'] = 'fail';
                echo CJSON::encode($result);
	}
        
        /**
	 * Approves a particular model.
	 * @param integer $id the ID of the model to be approve
	 */
	public function actionApprove($id)
	{
		// we only allow deletion via POST request
                $result = array('approvedID' => $id);
                if($this->loadModel($id)->setApproved())
                    $result['code'] = 'success';
                else 
                    $result['code'] = 'fail';
                echo CJSON::encode($result);
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Comment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Comment']))
			$model->attributes=$_GET['Comment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
        
        public function actionPostComment()
        {
            if(isset($_POST['Comment']) && Yii::app()->request->isAjaxRequest)
            {
                $comment = new Comment();
                $comment->attributes = $_POST['Comment'];
                $result = array();
                if($comment->save())
                {
                    $result['code'] = 'success';
                    $this->beginClip("list");
                        $this->widget('comments.widgets.ECommentsListWidget', array(
                            'model' => $comment->ownerModel,
                            'showPopupForm' => false,
                        ));
                    $this->endClip();
                    $this->beginClip('form');
                        $this->widget('comments.widgets.ECommentsFormWidget', array(
                            'model' => $comment->ownerModel,
                        ));
                    $this->endClip();
                    $result['list'] = $this->clips['list'];
                }
                else 
                {
                    $result['code'] = 'fail';
                    $this->beginClip('form');
                        $this->widget('comments.widgets.ECommentsFormWidget', array(
                            'model' => $comment->ownerModel,
                            'validatedComment' => $comment,
                        ));
                    $this->endClip();
                }
                $result['form'] = $this->clips['form'];
                echo CJSON::encode($result);
            }
        }

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Comment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}
