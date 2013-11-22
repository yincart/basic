<?php

class DefaultController extends Controller {

    public $layout = '//layouts/member';

    public function actionIndex() {
        $this->render('index');
    }

    public function actionMyOrder() {
        $cri = new CDbCriteria(array(
                    'condition' => 'user_id =' . Yii::app()->user->id
                ));
        $myorders = Orders::model()->findAll($cri);

        $this->render('myOrder', array(
            'myorders' => $myorders
        ));
    }

    public function actionOrderView() {
        $id = $_REQUEST['id'];

        $cri = new CDbCriteria(array(
                    'condition' => 'order_id =' . $id
                ));

        $model = Orders::model()->find($cri);

        $this->render('orderView', array(
            'model' => $model
        ));
    }

}