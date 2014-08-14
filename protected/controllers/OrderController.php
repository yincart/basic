<?php

class OrderController extends Controller
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
//    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
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
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function actionCheckout()
    {
        if (isset($_POST['position'])) {
            $keys = isset($_REQUEST['position']) ? (is_array($_REQUEST['position']) ? $_REQUEST['position'] : explode('_', $_REQUEST['position'])) : array();
            $this->render('checkout', array('keys' => $keys));
        } else {
            $item = $this->loadItem();
            $item->detachBehavior("CartPosition");
            $item->attachBehavior("CartPosition", new ECartPositionBehaviour());
            $item->setRefresh(true);
            $quantity = empty($_POST['qty']) ? 1 : intval($_POST['qty']);
            $item->setQuantity($quantity);
            $this->render('checkout', array('item' => $item));
        }
    }

    public function loadItem()
    {
        if (empty($_POST['item_id'])) {
            throw new CHttpException(400, 'Bad Request!.');
        }
        $item = CartItem::model()->with('skus')->findByPk(intval($_POST['item_id']));
        if (empty($item)) {
            throw new CHttpException(400, 'Bad Request!.');
        }
        $item->cartProps = empty($_POST['props']) ? '' : $_POST['props'];
        return $item;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Order;
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            if (!$_POST['delivery_address'] && !Yii::app()->user->isGuest) {
                 echo '<script>alert("您还没有添加收货地址！")</script>';
                 echo '<script type="text/javascript">history.go(-1)</script>';
                 } else {
            if (isset($_POST)) {

                $transaction = $model->dbConnection->beginTransaction();
                try {
                    $cart = Yii::app()->cart;
                    if(!Yii::app()->user->isGuest)
                    {
                        $model->attributes = $_POST;
                        $model->user_id = Yii::app()->user->id ? Yii::app()->user->id : '0';
                        $cri = new CDbCriteria(array(
                            'condition' => 'contact_id =' . $_POST['delivery_address'] . ' AND user_id = ' . Yii::app()->user->id
                        ));
                        $address = AddressResult::model()->find($cri);
                        $model->receiver_country = $address->country;
                        $model->receiver_name = $address->contact_name;
                        $model->receiver_state = $address->state;
                        $model->receiver_city = $address->city;
                        $model->receiver_district = $address->district;
                        $model->receiver_address = $address->address;
                        $model->receiver_zip = $address->zipcode;
                        $model->receiver_mobile = $address->mobile_phone;
                        $model->receiver_phone = $address->phone;
                    }
                    else
                    {
                        $address = $_POST['AddressResult'];
                        $model->user_id = '0';
                        $model->receiver_name = $address['contact_name'];
                        $model->receiver_state = $address['state'];
                        $model->receiver_city = $address['city'];
                        $model->receiver_district = $address['district'];
                        $model->receiver_address = $address['address'];
                        $model->receiver_zip = $address['zipcode'];
                        $model->receiver_mobile = $address['mobile_phone'];
                        $model->receiver_phone = $address['phone'];
                        $model ->payment_method_id= $_POST['payment_method_id'];
                        $model ->memo = $_POST['memo'];
                    }
                    $model->create_time = time();
                    $model->order_id=F::get_order_id();
                    $model->total_fee = 0;
                    if(isset($_POST['keys']))
                    {
                        foreach ($_POST['keys'] as $key){
                            $item= $cart->itemAt($key);
                            $model->total_fee += $item['quantity'] * $item['price'];
                        }
                    }else
                    {
                        $item = Item::model()->findBypk($_POST['item_id']);
                        $model->total_fee = $item->price * $_POST['quantity'];
                    }
                    if ($model->save()) {
                        if(empty($_POST['keys']))
                        {
                            $item = Item::model()->findBypk($_POST['item_id']);
                            $sku = Sku::model()->findByPk($_POST['sku_id']);
                            if($sku->stock < $_POST['quantity'])
                            {
                                throw new Exception('stock is not enough!');
                            }
                            $OrderItem = new OrderItem;

//                            $OrderItem->order_id = $model->order_id;
//                            $OrderItem->item_id = $item->item_id;
//                            $OrderItem->title = $item->title;
//                            $OrderItem->desc = $item->desc;
//                            $OrderItem->pic = $item->getMainPic();
//                            $OrderItem->props_name = $sku->props_name;
//                            $OrderItem->price = $item->price;
//                            $OrderItem->quantity = $_POST['quantity'];
//                            $OrderItem->total_price = $OrderItem->quantity * $OrderItem->price;
                            if (!$OrderItem::model()->saveOrderItem($OrderItem,$model->order_id,$item,$sku->props_name,$_POST['quantity'])) {
                                throw new Exception('save order item fail');
                            }
                        }
                        else
                        {
                             foreach ($_POST['keys'] as $key){
                                $item= $cart->itemAt($key);
                                 $sku=Sku::model()->findByPk($item['sku']['sku_id']);
                                if($sku->stock<$item['quantity']){
                                 throw new Exception('stock is not enough!');
                                }
                                 $sku->stock-=$item['quantity'];
                                if(!$sku->save()) {
                                 throw new Exception('cut down stock fail');
                                 }
                                $OrderItem = new OrderItem;
                                $OrderItem->order_id = $model->order_id;
                                $OrderItem->item_id = $item['item_id'];
                                $OrderItem->title = $item['title'];
                                $OrderItem->desc = $item['desc'];
                                $OrderItem->pic = $item->getMainPic();
                                $OrderItem->props_name = $sku['props_name'];
                                $OrderItem->price = $item['price'];
                                $OrderItem->quantity = $item['quantity'];
                                $OrderItem->total_price = $OrderItem->quantity * $OrderItem->price;
                                if (!$OrderItem->save()) {
                                    throw new Exception('save order item fail');
                                }
                               $cart->remove($key);
                             }
                        }
                    } else {
                        throw new Exception('save order fail');
                    }
                    $transaction->commit();
                    $this->redirect(array('success'));
                } catch (Exception $e) {
                    $transaction->rollBack();
                    $this->redirect(array('fail'));
                     }
                }
            }
    }
    public function actionFail()
    {
        $this->render('fail');
    }

    public function actionSuccess()
    {
        $this->render('success');
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
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
        $model = new Order;
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Order']))
            $model->attributes = $_GET['Order'];
        $this->render('admin', array(
            'model' => $model
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
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'order-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetChildAreas($parent_id)
    {
        $areas = Area::model()->findAllByAttributes(array('parent_id' => $parent_id));
        $areasData = CHtml::listData($areas, 'area_id', 'name');
        echo json_encode(CMap::mergeArray(array('0' => ''), $areasData));
    }

    /**
     * name: actionAddAddressByAjax
     * function:add address when buy product var use new address
     * @author: shuai.du@jago-ag.cn
     */
    public function actionAddAddressByAjax(){
        $model = new AddressResult;
        if (isset($_POST['AddressResult']) && Yii::app()->request->isAjaxRequest) {
            $model->attributes = $_POST['AddressResult'];
            $result = array();
            if ($model->save())
            {
                echo 'success@';
                echo $model->contact_id.'@';
//                echo $model->contact_id;
//                echo '<li>'. CHtml::radioButton('delivery_address',true,array('value' => $model->contact_id,'id' => 'delivery_address'.$model->contact_id)).CHtml::tag('span', array(
//                            'class' => 'buyer-address shop_selection'),
//                        $model->s->name . '&nbsp;' . $model->c->name . '&nbsp;' . $model->d->name . '&nbsp;' . $model->address . '&nbsp;(' . $model->contact_name . '&nbsp;收)&nbsp;' . $model->mobile_phone).'</li>';
                $this->renderPartial('address',array('model' => $model));

            }
            else
            {
                $errors = $model->getErrors();
                foreach($errors as  $error):
                    ?>
                    <li><?php echo $error[0];?></li>
            <?php
               endforeach;
            }
        };
    }
}
