<?php

class CartController extends Controller {

    public $layout = '//layouts/column2';

    public function actionIndex() {
        $cart = Yii::app()->cart;
        $mycart = $cart->contents();
        $total = $cart->total();
        $this->render('index', array(
            'mycart' => $mycart,
            'total' => $total
        ));
    }

    /*
     * 商品列表页单个商品加入购物车
     */

    public function actionAddCart() {
        $qty = $_POST['qty'];
        $id = $_POST['item_id'];
        $cart = Yii::app()->cart;
        $mycart = $cart->contents();

        $model = Item::model()->findByPk($id);

        $insert_data = array('id' => $id, 'pic_url' => $model->getSmallThumb(), 'sn' => $model->sn, 'title' => $model->title, 'name' =>$id, 'price' => $model->shop_price, 'qty' => $qty);

        if (empty($mycart)) {
            $data = $insert_data;
        } else {
            //当购物车里存在此商品，则数量相加 
            foreach ($mycart as $key => $value) {
                if ($id === $value['id']) {
                    $mycart[$key]['qty'] = $qty + $value['qty'];
                }
                if (!$mycart[$key][$id]) {
                    $cart->insert($insert_data);
                }
            }
            $data = $mycart;
        }

        $cart->insert($data);
    }

    /*
     * 商品列表页批量购买和商品详情页加入购物车
     */

    public function actionAddToCart() {
        $session = new CHttpSession;
        $session->open();
        $cart = Yii::app()->cart;
        $mycart = $cart->contents();
        unset($_POST['yt0']);
        
        if (empty($mycart)) {
            $data = $_POST;
        } else {
            //判断$_POST是否为二维数组
            if (F::check2Array($_POST)) {
                foreach ($_POST as $k => $v) {
                    $id = $v['id'];
                    $qty += $v['qty'];
                    //当购物车里存在此商品，则数量相加 
                    foreach ($mycart as $key => $value) {
                        if ($v['id'] === $value['id']) {
                            $mycart[$key]['qty'] = $v['qty'] + $value['qty'];
                        }
                        if (!$mycart[$key][$id]) {
                            $cart->insert($_POST);
                        }
                    }
                    $data = $mycart;
                }
                if ($qty == 0) {
//                    echo '<script>alert("您没有填写数量！")</script>';
                    $this->redirect(array('/item'));
                }
            } else {
                $id = $_POST['id'];
                //当购物车里存在此商品，则数量相加 
                foreach ($mycart as $key => $value) {
                    if ($_POST['id'] === $value['id']) {
                        $mycart[$key]['qty'] = $_POST['qty'] + $value['qty'];
                    }
                    if (!$mycart[$key][$id]) {
                        $cart->insert($_POST);
                    }
                }
                $data = $mycart;
            }
        }
        if ($cart->insert($data)) {
            $this->redirect(array('/cart'));
        }
    }

    public function actionUpdate() {
        $cart = Yii::app()->cart;
//        print_r($_POST);
//        exit;
        unset($_POST['yt0']);
        $data = $_POST;
        foreach ($data as $k => $v) {
            Yii::app()->cart->update($v);
        }
        $this->redirect(array('/cart/index'));
    }

    public function actionDelete() {
        $id = $_REQUEST['rowid'];
        $data = array(
            'rowid' => $id,
            'qty' => 0
        );
        if (Yii::app()->cart->update($data))
            $this->redirect(array('/cart/index'));
    }

    public function actionDestory() {
        $cart = Yii::app()->cart;
        $cart->destroy();
        $this->redirect(array('/cart/index'));
    }

    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}