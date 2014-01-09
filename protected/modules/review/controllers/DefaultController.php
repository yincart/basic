<?php
/**
 * Created by cangzhou.
 * email:wucangzhou@gmail.com
 * Date: 12/17/13
 * Time: 2:47 PM
 */
class DefaultController extends Controller
{

	public function actionIndex()
	{

        if($_REQUEST['product_id']){
                $this->render('index',array(
                   'product_id'=>$_REQUEST['product_id'],
                    'entity_id'=>$_REQUEST['entity_id'],
                    'rating'=>$_REQUEST['rating'],
                ));
        }else return false;
	}
    /****create reply****/
    public function actionReplySave(){
        $model=new Review;
        if(isset($_POST['text'])){
            $model->create_at=time();
            $model->content=$_POST['text'];
            $model->customer_id=Yii::app()->user->id;
            $model->entity_id=2;
            $model->entity_pk_value=$_POST['customerId'];
            if($model->customer_id!=''){
                if($model->save()){
                    return ture;
                }
            }else return false;
        }else return false;
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
                'actions'=>array('view'),
                'users'=>array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create','update','replySave'),
                'users'=>array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete','_review'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    public function actionReviewDetail(){
        if(isset($_REQUEST['reviewId'])){
            $review=Review::model()->findByPk($_REQUEST['reviewId']);
            $reviewReply=Review::model()->reviewFind($_REQUEST['reviewId'],2,'');
            $this->render ('reviewDetail',array('review'=>$review,'reviewReply'=>$reviewReply));
        }

    }
}