<?php

class CartController extends YController
{

    public function actionIndex()
    {
        $this->render('index', array('cart' => Yii::app()->cart));
    }

    public function actionAdd()
    {
        $item = $this->loadItem();
        $quantity = empty($_POST['qty']) ? 1 : intval($_POST['qty']);
        Yii::app()->cart->put($item, $quantity);
    }

    public function actionUpdate()
    {
        $item = $this->loadItem();
        $quantity = empty($_POST['qty']) ? 1 : intval($_POST['qty']);
        Yii::app()->cart->update($item, $quantity);
    }

    public function actionRemove($key)
    {
        Yii::app()->cart->remove($key);
        $this->redirect('index');
    }

    public function actionClear()
    {
        Yii::app()->cart->clear();
        $this->redirect('index');
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
}