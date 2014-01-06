<?php

class OrderController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/mall';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($user_id)
    {
        $model = new Order;
        $model->user_id = $user_id;
        $item = new Item;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model)


        if (isset($_POST['Order']) && isset($_POST['Item'])) {
            $transaction = $model->dbConnection->beginTransaction();
            try {
                $model->attributes = $_POST['Order'];
                $model->create_time = time();
                if ($model->save()) {
                    foreach ($_POST['Item']['item_id'] as $itemId) {
                        $orderItem = OrderItem::model()->findAll("item_id='$itemId'");
                        if (!$orderItem) {
                            $items = Item::model()->findByPk($itemId);
                            $orderItem = new OrderItem;
                            $orderItem->item_id = $itemId;
                            $orderItem->title = $items->title;
                            $orderItem->desc = $items->desc;
                            //                    $orderItem->pic = $items->getMainPic();   //need update;
                            $orderItem->props_name = $items->props_name;
                            $orderItem->price = $items->price;
                            $orderItem->quantity = 1; //need to update
                            $orderItem->total_price = $orderItem->price * $orderItem->quantity;
                            $orderItem->order_id = $model->order_id;
                            if (!$orderItem->save()) {
                                throw new Exception('save order item fail');
                            }
                        }
                    }
                } else {
                    throw new Exception('save order item fail');
                }
                $transaction->commit();
                $this->redirect(array('view', 'id' => $model->order_id));
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
        $this->render('create', array(
            'model' => $model, 'item' => $item
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $item = Item::model()->with('orderItems')->findAll(new CDbCriteria(array('condition' => "order_id='$id'")));
        if (isset($_POST['Order']) && isset($_POST['Item'])) {
            $transaction = $model->dbConnection->beginTransaction();
            try {
                $model->attributes = $_POST['Order'];
                $model->update_time = time();
                if ($model->save()) {
                    $originals = OrderItem::model()->findAll("order_id='$model->order_id'");
                    $flag = array();
                    foreach ($originals as $key => $original) {
                        foreach ($_POST['Item']['item_id'] as $itemId) {
                            if ($original->item_id == $itemId) {
                                $flag[$key] = 1;
                            }
                        }
                    }
                    foreach ($originals as $key => $original) {
                        if ($flag[$key] != 1) {
                            $original->delete();
                        }
                    }
                    foreach ($_POST['Item']['item_id'] as $itemId) {
                        $items = Item::model()->findByPk($itemId);
                        $orderItem = OrderItem::model()->find("item_id='$itemId'");
                        if (!$orderItem) {
                            $orderItem = new OrderItem;
                            $orderItem->item_id = $itemId;
                            $orderItem->title = $items->title;
                            $orderItem->desc = $items->desc;
                            //                    $orderItem->pic = $items->getMainPic();   //need update;
                            $orderItem->props_name = $items->props_name;
                            $orderItem->price = $items->price;
                            $orderItem->quantity = 1; //need to update
                            $orderItem->total_price = $orderItem->price * $orderItem->quantity;
                            if (!$orderItem->save()) {
                                throw new Exception('save order item fail', 0, $orderItem);
                            }
                        }
                    }
                }
                $transaction->commit();
                $this->redirect(array('view', 'id' => $model->order_id));
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
        $this->render('update', array(
            'model' => $model, 'item' => $item
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Order');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Order('search');
        $model->unsetAttributes();
        $users = new Users('search');
        $users->unsetAttributes();
        if (isset($_GET['Users'])) {
            print_r($_GET['Users']);
            $users->attributes = $_GET['Users'];
        }
        if (isset($_GET['Order']))
            $model->attributes = $_GET['Order'];
        $this->render('admin', array(
            'model' => $model, 'users' => $users
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Order::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    public function actionDynamiccities()
    {
        echo CHtml::tag("option", array("value" => ''), CHtml::encode(''), true);
        echo $_GET['receiver_state'];
        $data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $_GET['receiver_state']));
        $data = CHtml::listData($data, "area_id", "name");
        foreach ($data as $value => $name) {
            echo CHtml::tag("option", array("value" => $value), CHtml::encode($name), true);
        }
    }

    public function actionDynamicdistrict()
    {

        if ($_GET["receiver_city"]) {
            $data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $_GET["receiver_city"]));
            $data = CHtml::listData($data, "area_id", "name");
            foreach ($data as $value => $name) {
                echo CHtml::tag("option", array("value" => $value), CHtml::encode($name), true);
            }
        }
    }

    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'address-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionAdd_goods()
    {
        $this->layout = '/';
        $goods = new Item('search');
        $goods->unsetAttributes();
        if (isset($_GET['Item'])) {
            $goods->attributes = $_GET['Item'];
        }
        $this->render('add_goods', array('goods' => $goods));
    }
}
