<?php

class ItemController extends MallBaseController
{
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array_merge(array(
                array('allow',
                    'users' => array('@'),
                )
            ), parent::accessRules()
        );
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Item();

        if (isset($_POST['Item'])) {
            $this->handlePostData();
            $model->attributes = $_POST['Item'];

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->item_id));
            } else {
                var_dump($model);exit;
            }
        }

        $this->render('create', array(
            'model' => $model,
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

        if (isset($_POST['Item'])) {
            $this->handlePostData();
            $model->attributes = $_POST['Item'];

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->item_id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));


        $skuIds = array();

        if (isset($_POST['Item'])) {
            $model->attributes = $_POST['Item'];


            if ($_POST['Item']['props']) {
                $model->props = CJSON::encode($_POST['Item']['props']);
            }

            if ($_POST['Item']['skus']) {
                $model->skus = CJSON::encode($_POST['Item']['skus']);
                foreach ($_POST['Item']['skus']['table'] as $s_key => $s_value) {
                    if ($s_value['sku_id'] > 0) {
                        $sku = Sku::model()->findByPk($s_value['sku_id']);
                        $sku->props = CJSON::encode(($s_value['props']));
                        $sku->quantity = $s_value['quantity'];
                        $sku->price = $s_value['price'];
                        $sku->outer_id = $s_value['outer_id'];
                        $sku->status = $s_value ? 'normal' : 'deleted';
                        $sku->save();
                        $skuIds[] = $sku->sku_id;
                    } else {
                        $jsp = CJSON::encode(($s_value['props']));
                        $sku = Sku::model()->findByAttributes(array("props" => $jsp, "item_id" => $model->item_id));
                        if (!$sku) {
                            $sku = new Sku;
                            $sku->item_id = $model->item_id;
                        }

                        $sku->props = $jsp;
                        $sku->quantity = $s_value['quantity'];
                        $sku->price = $s_value['price'];
                        $sku->outer_id = $s_value['outer_id'];
                        $sku->status = $s_value ? 'normal' : 'deleted';
                        $sku->save();
                        if ($sku->sku_id > 0) $skuIds[] = $sku->sku_id;
                    }
                }
                //删除
                $rawData = Sku::model()->findAll('item_id = ' . $model->item_id);
                $delArr = array();
                foreach ($rawData as $k1 => $v1) {
                    if (!in_array($v1->sku_id, $skuIds)) {
                        $delArr[] = $v1->sku_id;
                    }
                }

                if (count($delArr)) {
                    Sku::model()->updateAll(array("status" => "deleted"), 'sku_id IN (' . implode(', ', $delArr) . ')');
                }
            }


            $model->skus_data = implode(",", $skuIds);

            if ($model->save()) {

                //$this->redirect(array('view', 'id' => $model->item_id));
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     * @throws CHttpException
     */
    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $model = $this->loadModel($id);
            $images = ItemImg::model()->findAllByAttributes(array('item_id' => $id));
            foreach ($images as $k => $v) {
                $img = $v['url'];
// we only allow deletion via POST request
                ItemImg::model()->deleteAllByAttributes(array('item_id' => $id));
                @unlink(dirname(Yii::app()->basePath) . '/upload/item/image/' . $img);
            }
            $model->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Item('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Item']))
            $model->attributes = $_GET['Item'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     * @return CActiveRecord
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Item::model()->with(array('image' => array('order' => 'position ASC')))->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }


//批量操作
    public function actionBulk()
    {
        print_r($_POST);
        exit;
        $ids = $_POST['item-grid_c0'];
//        print_r($ids);
//        exit;
        $count = count($ids);
        if ($count == 0) {
            echo '<script>alert("请至少选择1个项目.")</script>';
            echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
            die;
        } elseif ($count > 0 && NULL == $_POST['act']) {
            echo '<script>alert("请选择操作类型.")</script>';
            echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
            die;
        } else {
            if ('delete' == $_POST['act']) { //批量删除
                if ($count == 1) {
                    $item = Item::model()->findByPk($ids);
                    $images = ItemImg::model()->findAllByAttributes(array('item_id' => $item->item_id));
                    foreach ($images as $k => $v) {
                        $img = $v['url'];
// we only allow deletion via POST request
                        ItemImg::model()->deleteAllByAttributes(array('item_id' => $item->item_id));
                        @unlink(dirname(Yii::app()->basePath) . '/upload/item/image/' . $img);
                    }

                    Item::model()->deleteByPk($ids);
                    echo '<script>alert("删除成功.")</script>';
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $item = Item::model()->findAllByPk($ids);
                    foreach ($item as $i) {
                        $images = ItemImg::model()->findAllByAttributes(array('item_id' => $i->item_id));
                        foreach ($images as $k => $v) {
                            $img = $v['url'];
// we only allow deletion via POST request
                            ItemImg::model()->deleteAllByAttributes(array('item_id' => $i->item_id));
                            @unlink(dirname(Yii::app()->basePath) . '/upload/item/image/' . $img);
                        }
                    }
                    Item::model()->deleteAllByAttributes(array('item_id' => $ids));
                    echo '<script>alert("删除成功.")</script>';
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('if_show' == $_POST['act']) { //批量上架
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_show" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_show" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_show' == $_POST['act']) { //批量下架
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_show" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_show" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('is_promote' == $_POST['act']) { //批量特价
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_promote" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_promote" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_promote' == $_POST['act']) { //取消特价
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_promote" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_promote" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('is_new' == $_POST['act']) { //批量新品
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_new" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_new" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_new' == $_POST['act']) { //取消新品
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_new" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_new" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('hot' == $_POST['act']) { //批量推荐
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_hot" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_hot" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_hot' == $_POST['act']) { //取消推荐
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_hot" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_hot" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('best' == $_POST['act']) { //批量精品
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_best" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_best" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_best' == $_POST['act']) { //取消精品
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_best" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_best" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('discount' == $_POST['act']) { //批量折扣
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_discount" => 1));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_discount" => 1), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            } elseif ('un_discount' == $_POST['act']) { //取消折扣
                if ($count == 1) {
                    Item::model()->updateByPk($ids, array("is_discount" => 0));
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                } else {
                    $id = implode(',', $ids);
                    $criteria = new CDbCriteria(array(
                        'condition' => 'item_id in (' . $id . ')'
                    ));
                    Item::model()->updateAll(array("is_discount" => 0), $criteria);
                    echo '<script type="text/javascript">setTimeout(\'location.href="' . Yii::app()->createUrl('/mall/item/admin') . '"\',10);</script>';
                    die;
                }
            }
        }
    }

    public function actionGetItemSpec()
    {
        $skus = $_POST['Item']['skus'];
        foreach ($skus as $key => $value) {
            $sku[] = $_POST['Item']['skus'][$key];
        }
        $options = CJavaScript::encode($sku);

        echo json_encode($sku);
    }


    public function actionAjaxGetSkus()
    {

        if (!Yii::app()->request->isAjaxRequest) {
            exit();
        }

        $id = $_POST["item_id"];
        $skus = Sku::getSkusData($id);

        echo CJSON::encode($skus, true);

        Yii::app()->end();
    }

    /**
     * format post props value
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    protected function handlePostData()
    {
        $itemProps = array();
        if (isset($_POST['ItemProp']) && is_array($_POST['ItemProp'])) {
            $itemProps = $_POST['ItemProp'];
            unset($_POST['ItemProp']);
        }
        if (isset($_POST['Item']['skus']['checkbox']) && is_array($_POST['Item']['skus']['checkbox'])) {
            $itemProps = CMap::mergeArray($itemProps, $_POST['Item']['skus']['checkbox']);
        }
        list($_POST['Item']['props'], $_POST['Item']['props_name']) = $this->handleItemProps($itemProps);

        if (isset($_POST['Item']['skus']['table']) && is_array($_POST['Item']['skus']['table'])) {
            $skus = array();
            foreach ($_POST['Item']['skus']['table'] as $pid => $sku) {
                list($sku['props'], $sku['props_name']) = $this->handleItemProps($sku['props']);
                $skus[] = $sku;
            }
            $_POST['Item']['skus'] = $skus;
        }

        if (isset($_POST['ItemImg']['pic']) && isset($_POST['ItemImg']['item_img_id']) && is_array($_POST['ItemImg']['pic']) && is_array($_POST['ItemImg']['item_img_id'])) {
            $pics = $_POST['ItemImg']['pic'];
            $ids = $_POST['ItemImg']['item_img_id'];
            if ($count = count($pics) === count($ids)) {
                $itemImgs = array();
                for ($i = 0, $count = count($pics); $i < $count; $i++) {
                    $itemImgs[] = array(
                        'item_img_id' => $ids[$i],
                        'pic' => $pics[$i],
                        'position' => $i,
                    );
                }
                unset($_POST['ItemImg']);
                $_POST['Item']['itemImgs'] = $itemImgs;
            }
        }
    }

    /**
     * format item prop data to json format from post
     * @param $itemProps
     * @return array
     * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
     */
    protected function handleItemProps($itemProps)
    {
        $props = array();
        $props_name = array();
        foreach ($itemProps as $pid => $vid) {
            $itemProp = ItemProp::model()->findByPk($pid);
            $pname = $itemProp->prop_name;
            if (is_array($vid)) {
                $props[$pid] = array();
                $props_name[$pname] = array();
                foreach ($vid as $v) {
                    $props[$pid][] = $pid . ':' . $v;
                    $propValue = PropValue::model()->findByPk($v);
                    $vname = $propValue ? $propValue->value_name : $v;
                    $props_name[$pname][] = $pname . ':' . $vname;
                }
            } else {
                $props[$pid] = $pid . ':' . $vid;
                $propValue = PropValue::model()->findByPk($v);
                $vname = $propValue ? $propValue->value_name : $v;
                $props_name[$pname] = $pname . ':' . $vname;
            }
        }
        return array(json_encode($props), json_encode($props_name));
    }

    public function actionItemProps()
    {
        $category_id = empty($_GET['category_id']) ? 0 : $_GET['category_id'];
        $itemProps = ItemProp::model()->with(array('propValues'))->findAllByAttributes(array('category_id' => $category_id));
        $item_id = empty($_GET['item_id']) ? 0 : $_GET['item_id'];
        $item = Item::model()->findByPk($item_id);
        $this->renderPartial('_form_prop', array('itemProps' => $itemProps, 'item' => $item), false, true);
    }

}
