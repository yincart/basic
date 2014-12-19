<?php

class OrderController extends MallBaseController
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $content_title = '订单管理';

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $order = Order::model()->findByPk($id);
        $order_items = $order->orderItems;
        $this->render('view', array(
            'Order' => $order, 'Order_item' => $order_items
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    /*  public function actionCreate($user_id)
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
                          $items = Item::model()->findByPk($itemId);
                          $orderItem = new OrderItem;
                          $orderItem->item_id = $itemId;
                          $orderItem->title = $items->title;
                          $orderItem->desc = $items->desc;
                          $orderItem->pic = $items->getMainPic();
                          $orderItem->props_name = $items->props_name;
                          $orderItem->price = $items->price;
                          $orderItem->quantity = 1; //need to update
                          $orderItem->total_price = $orderItem->price * $orderItem->quantity;
                          $orderItem->order_id = $model->order_id;
                          if (!$orderItem->save()) {
                              throw new Exception('save order item fail');
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
  */

    public function actionCreate($user_id)
    {
        $model = new Order;
        $model->user_id = $user_id;
        $item = new Item;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model)
        if (isset($_POST['Order']) && isset($_POST['Sku'])) {
            $transaction = $model->dbConnection->beginTransaction();
            try {
                $model->attributes = $_POST['Order'];
                $model->order_id=F::get_order_id();
                $model->create_time = time();
                if ($model->save()) {
                    foreach ($_POST['Sku']['item_id'] as $key => $itemId) {
                        $items = Item::model()->findByPk($itemId);
                        $sku = Sku::model()->findByPk($_POST['Sku']['sku_id'][$key]);
                        if ($sku->stock < $_POST['Item-number'][$key]) {
                            throw new CException('Stock is not enough' . json_encode($sku->getErrors()),0);
                        }
                        $orderItem = new OrderItem;
                        $orderItem->item_id = $itemId;
                        $orderItem->title = $items->title;
                        $orderItem->desc = $items->desc;
                        $orderItem->pic = $items->getMainPic();
                        $orderItem->props_name = $sku->props_name;
                        $orderItem->price = $sku->price;
                        $orderItem->quantity = $_POST['Item-number'][$key]; //need to update
                        $sku->stock -= $_POST['Item-number'][$key];
                        if (!$sku->save()) {
                            throw new Exception('Cut down stock fail');
                        }
                        $orderItem->total_price = $orderItem->price * $orderItem->quantity;
                        $orderItem->order_id = $model->order_id;
//                        var_dump($orderItem->save());die;
                        if (!$orderItem->save()) {
                            throw new Exception('save order item fail');
                        }
                    }
                } else {
                    throw new Exception('save order fail');
                }
                $transaction->commit();
                $this->redirect(array('view', 'id' => $model->order_id));
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
        $this->render('create', array(
            'model' => $model, 'Item' => $item
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
        $Item = Item::model()->with('orderItems')->findAll(new CDbCriteria(array('condition' => "order_id='$id'")));
        foreach ($Item as $key1 => $items)
            foreach ($items->orderItems as $key2 => $orderItem) {
                $ItemSku[$key1][$key2] = Sku::model()->findByAttributes(array('item_id' => $orderItem->item_id, 'props_name' => $orderItem->props_name));
            }
        if (isset($_POST['Order']) && isset($_POST['Sku'])) {
            $transaction = $model->dbConnection->beginTransaction();
            try {

                $model->attributes = $_POST['Order'];
                $model->update_time = time();
                if ($model->save()) {
                    $flag = array();
                    $OrderItem = OrderItem::model()->findAllByAttributes(array('order_id' => $id));
                    foreach ($OrderItem as $key => $original) {
                        $criteria=new CDbCriteria();
                        $criteria->addCondition('item_id=:item_id');
//                        $criteria->addCondition('price=:price');
                        $criteria->addCondition('props_name=:props_name');
                        $criteria->params[':item_id']=$original->item_id;
//                        $criteria->params[':price']=$original->price;
                        $criteria->params[':props_name']=$original->props_name;
                        $sku = Sku::model()->find($criteria);
                        $sku->stock+=$original->quantity;
                        $sku->save();
                        foreach ($_POST['Sku']['sku_id'] as $skuId) {
                            if ($sku->sku_id == $skuId) $flag[$key] = 1;
                        }
                    }
                    foreach ($OrderItem as $key => $original) {
                            if ($flag[$key] != 1)
                        {
                            $original->delete();
                        }
                    }

                    foreach ($_POST['Sku']['item_id'] as $key => $itemId) {
                        $item = Item::model()->findByPk($itemId);
                        $sku = Sku::model()->findByPk($_POST['Sku']['sku_id'][$key]);
                        if ($sku->stock < $_POST['Item-number'][$key]) {
                            throw new Exception('Stock is not enough');
                        }
                        $criteria=new CDbCriteria();
                        $criteria->addCondition('item_id=:item_id');
                        $criteria->addCondition('price=:price');
                        $criteria->addCondition('props_name=:props_name');
                        $criteria->params[':item_id']=$sku->item_id;
                        $criteria->params[':price']=$sku->price;
                        $criteria->params[':props_name']=$sku->props_name;
                        $orderItem=OrderItem::model()->find($criteria);
                        if(!isset($orderItem)){
                        $orderItem=new OrderItem;
                        $orderItem->item_id = $itemId;
                        $orderItem->title = $item->title;
                        $orderItem->desc = $item->desc;
                        $orderItem->pic = $item->getMainPic();
                        }
                        $orderItem->props_name = $sku->props_name;
                        $orderItem->price = $sku->price;
                        $orderItem->quantity = $_POST['Item-number'][$key];
                        $sku->stock -= $_POST['Item-number'][$key];
                        if (!$sku->save()) {
                            throw new Exception('Cut down stock fail');
                        }
                        $orderItem->total_price = $orderItem->price * $orderItem->quantity;
                        $orderItem->order_id = $model->order_id;
                        if (!$orderItem->save()) {
                            throw new Exception('save order item fail');
                        }
                    }
                } else {
                    throw new Exception('save order fail');
                }
                $transaction->commit();
                $this->redirect(array('view', 'id' => $model->order_id));
            } catch (Exception $e) {
                $transaction->rollBack();
            }
        }
        $this->render('update', array(
            'model' => $model, 'Item' => $Item, 'ItemSku' => $ItemSku
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
            $OrderItems = OrderItem::model()->findAllByAttributes(array('order_id' => $id));
            foreach ($OrderItems as $OrderItem) {
                $OrderItem->delete();
            }
            $this->loadModel($id)->delete();
            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
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
            $users->attributes = $_GET['Users'];
        }
        if (isset($_GET['Order'])) {
            $model->attributes = $_GET['Order'];
        }
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
//        echo $_GET['receiver_state'];
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

    public function actionSelectProp()
    {
        $select_id = $_GET['selectItem'];
        $items = Sku::model()->findAll(new CDbCriteria(array('condition' => "item_id='$select_id'")));
        foreach ($items as $key => $item) {
            $list[$key]['sku_id'] = $item->sku_id;
            $props = json_decode($item->props, true);
            $pro = '';
            foreach ($props as $prop) {
                $values = explode(':', $prop);
                $itemProp = ItemProp::model()->findByPk($values[0]);
                $propValue = PropValue::model()->findByPk($values[1]);
                $pro .= "$itemProp->prop_name:$propValue->value_name" . ' ';
            }
            $list[$key]['prop'] = $pro;
        }
        echo CHtml::tag("option", array("value" => ''), CHtml::encode('请选择'), true);
        foreach ($list as $item) {
            echo CHtml::tag("option", array("value" => $item['sku_id']), CHtml::encode($item['prop']), true);
        }
    }

    public function actionCheckStock()
    {

        $number = $_GET['number'];
        $sku_id = $_GET['sku_id'];
        $sku = Sku::model()->findByPk($sku_id);
        $criteria=new CDbCriteria();
        $criteria->addCondition('item_id=:item_id');
        $criteria->addCondition('price=:price');
        $criteria->addCondition('props_name=:props_name');
        $criteria->params[':item_id']=$sku->item_id;
        $criteria->params[':price']=$sku->price;
        $criteria->params[':props_name']=$sku->props_name;
        $orderItem=OrderItem::model()->find($criteria);
        if (($sku->stock+$orderItem->quantity) < $number || $number <=0) echo 0;
        else echo 1;

    }

    public function actionDeliverGoods($order_id)
    {
        $order = Order::model()->findByPk($order_id);
        $order->ship_status = 1;
        $order->save();
        $this->redirect(array('/mall/order/admin'));
    }

    /**
     * deliver product
     */
    public  function actionDeliver($id)
    {
        $order = Order::model()->findByPk($id);
        if(isset($_POST['Order']))
        {
            $order->order_ship_id = $_POST['Order'][order_ship_id];
            $order->ship_time = time();
            $order->ship_status = 1;
            $order->save();
            $this->redirect($_POST['backurl']);
        }
        else
        {
           $order = Order::model()->findByPk($id);
//        var_dump($order);exit;
          $this->renderPartial('deliver', array('Order' => $order));
        }
    }
}
