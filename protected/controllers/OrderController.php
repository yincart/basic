<?php

class OrderController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('checkout', 'create', 'update'),
                'users' => array('@'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCheckout() {
//        echo Yii::app()->user->id;
//        exit;
        if(Yii::app()->user->id){
        $cart = Yii::app()->cart;
        $mycart = $cart->contents();
        $total = $cart->total();
        $this->render('checkout', array(
            'mycart' => $mycart,
            'total' => $total
        ));
        }else{
            $this->redirect(array('/user/login'));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Order;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
//        print_r($_POST);       
//        exit;
        if(!$_POST['delivery_address']){
            echo '<script>alert("您还没有添加收货地址！")</script>';
            echo '<script type="text/javascript">history.go(-1)</script>';
            die;
        }else{
        if (isset($_POST)) {
            $model->attributes = $_POST;
            $model->order_id = F::get_order_id();
            $model->user_id = Yii::app()->user->id ? Yii::app()->user->id : '0';
            $model->create_time = time();
            
            $cri = new CDbCriteria(array(
               'condition'=>'contact_id ='.$_POST['delivery_address'].' AND user_id = '.Yii::app()->user->id
            ));
            $address = AddressResult::model()->find($cri);
            $model->receiver_name = $address->contact_name;
            $model->receiver_country = $address->country;
            $model->receiver_state = $address->state;
            $model->receiver_city = $address->city;
            $model->receiver_district = $address->district;
            $model->receiver_address = $address->address;
            $model->receiver_zip = $address->zipcode ;
            $model->receiver_mobile = $address->mobile_phone;
            $model->receiver_phone = $address->phone;
            
            if ($model->save()) {
                $cart = Yii::app()->cart;
                $mycart = $cart->contents();
                foreach ($mycart as $mc) {
                    $OrderItem = new OrderItem;
                    $OrderItem->order_id = $model->order_id;
                    $OrderItem->item_id = $mc['id'];
                    $OrderItem->title = $mc['title'];
                    $OrderItem->pic_url = serialize($mc['pic_url']);
                    $OrderItem->sn = $mc['sn'];
                    $OrderItem->num = $mc['qty'];
                    $OrderItem->price = $mc['price'];
                    $OrderItem->amount = $mc['subtotal'];
                    $OrderItem->save();
                }
                    
                $cart->destroy();
                $this->redirect(array('success'));
            }
          }
        }

//        $this->render('create', array(
//            'model' => $model,
//        ));
    }

    public function actionSuccess() {

        $this->render('success');
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Order'])) {
            $model->attributes = $_POST['Order'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->order_id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Order');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Order('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Order']))
            $model->attributes = $_GET['Order'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = Order::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
