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
//        print_r($_POST);

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

    /**
     * ajax 成功后一般返回json数据
     * 然后jquery读取出来
     * 在写个function, 转为html
     */
    public function actionGetPropValues()
    {
        $category_id = $_POST['category_id'] ? $_POST['category_id'] : NULL;
        $item_id = $_POST['item_id'] ? $_POST['item_id'] : NULL;
        $item = Item::model()->findByPk($item_id);
        $props_arr = CJSON::decode($item->props, TRUE);
        $skus_arr = CJSON::decode($item->skus, TRUE);
        $cri = new CDbCriteria(array('condition' => 'is_key_prop=1 and category_id =' . $category_id));
        $props = ItemProp::model()->findAll($cri);
        foreach ($props as $p) {
            echo '<div class="row">';
            if ($p->must == 1) {
                echo '<label class="span2 control-label" for="">' . $p->prop_name . '<span class="required">*</span></label>';
            } else {
                echo '<label class="span2 control-label" for="">' . $p->prop_name . '</label>';
            }
            echo '<div class="span10">';
            if ($p->type == 'input') {
                echo $p->getPropTextFieldValues($p->prop_name, $props_arr[$p->prop_id]);
            } elseif ($p->type == 'optional') {
                echo $p->getPropOptionValues($p->prop_name, $props_arr[$p->prop_id]);
            } elseif ($p->type == 'multiCheck') {
                echo $p->getPropCheckBoxListValues($p->prop_name, $props_arr[$p->prop_id]);
            }
            echo '</div>';
            echo '</div>';
        }

//	非关键属性

        $cri = new CDbCriteria(array(
            'condition' => 'is_key_prop=0 and is_sale_prop=0 and category_id =' . $category_id,
        ));
        $props = ItemProp::model()->findAll($cri);

        foreach ($props as $p) {
            echo '<div class="row">';
            if ($p->must == 1) {
                echo '<label class="span2 control-label" for="">' . $p->prop_name . '<span class="required">*</span></label>';
            } else {
                echo '<label class="span2 control-label" for="">' . $p->prop_name . '</label>';
            }
            echo '<div class="span9">';
            if ($p->type == 'input') {
                echo $p->getPropTextFieldValues($p->prop_name, $props_arr[$p->prop_id][0]);
            } elseif ($p->type == 'optional') {
                echo $p->getPropOptionValues($p->prop_name, $props_arr[$p->prop_id]);
            } elseif ($p->type == 'multiCheck') {
                echo $p->getPropCheckBoxListValues($p->prop_name, $props_arr[$p->prop_id]);
            }
            echo '</div>';
            echo '</div>';
        }

        //销售属性
        $cri = new CDbCriteria(array(
            'condition' => 'is_sale_prop=1 and category_id =' . $category_id,
        ));
        $props = ItemProp::model()->findAll($cri);

        if ($props) {
            echo '<div class="row">';
            echo '<label class="span2 control-label" for="">商品规格</label>';
            echo '<div class="span9">';
            echo '<div class="sku-wrap">';
            $ii = 0;
            $thead = '';
            foreach ($props as $p) {

                echo '<div class="sku-group"><label class="sku-head">' . $p->prop_name . '</label>';
                echo '<div class="sku-box  sku-color">';
                if ($p->type == 'multiCheck') {
                    echo $p->getPropCheckBoxListValues($p->prop_name, $skus_arr['checkbox'][$p->prop_id], 'change', 'skus', 'checkbox');
                }

                $thead .= '<th> <span id="thop_' . $ii . '">' . $p->prop_name . '</span></th>';
                $ii++;
                echo '</div></div>';
            }

            echo '<p id="output"></p>';
            echo '</div>';
            echo '</div>';
            echo '</div>';


            echo <<<EOF
	    <div class="row" style='margin-bottom:10px' style="visibility:hidden">
	    <div class="span2">&nbsp;</div>
	    <div class="span9" style="padding-left:0">
	    <div class="sku-map">
	    <table id="sku" class="table table-bordered">
	    <thead>
	    <tr>
		{$thead}
		<th>价格</th><th>数量</th><th>商家编码</th><th>操作</th></tr>
	    </thead>
	    <tbody>
	    </tbody>
	    </table>
	    </div>
	</div>
    </div>
EOF;
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
//        $config = <<<EOD
//           var array = {$options}
//EOD;
//$cs = Yii::app()->getClientScript();
//        $cs->registerScript($config, CClientScript::POS_HEAD);
//	$sku_count = count($sku);
//	
//	for($i=0;$i<$sku_count;$i++){
//	   $sku =  $sku[$i];
//	}
//	$ch = $sku[0];
//	$color = $sku[1];
//	
//	$ch = $_POST['Item']['props'][3];
//	$color = $_POST['Item']['props'][4];
//	$num = count($color);
//	if (!$ch || !$color)
//	    exit;
//	foreach ($ch as $v) {
//	    $v_list = PropValue::model()->findByPk($v);
//	    $out .= "<div class='one'>
//  	 <tr>
//    <td rowspan=" . $num . "> $v_list->value_name </td> 
//";
//	    if ($color) {
//		$i = 0;
//		foreach ($color as $c) {
//		    $c_list = PropValue::model()->findByPk($c);
//		    if ($i == 0) {
//			$out .=" 
//			    <td> $c_list->value_name </td>
//			    <td> <input name='price[]'></td>
//			    <td> <input name='quantity[]'></td>
//			    <td> <input name='outer_id[]'></td>
//			   ";
//		    } else {
//			$out .="</tr>";
//			$out .=" 
//		  	<tr>
//			    <td> $c_list->value_name </td>
//			    <td> <input name='price[]'></td>
//			    <td> <input name='quantity[]'></td>
//			    <td> <input name='outer_id[]'></td>
//			  </tr>";
//		    }
//		    $i++;
//		}
//	    }
//	    $out .="</tr></div>";
//	}
//	echo <<<EOF
//
//<table class="table table-bordered">
//  <tr>
//    <td>尺寸</td>
//    <td>颜色</td>
//    <td style="width:100px">价格</td>
//    <td style="width:100px">数量</td>
//    <td style="width:100px">商家编码</td>
//  </tr>
//$out
//  
//</table>
//EOF;
//    }
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
        if (isset($_POST['Item'])) {
            $_POST['Item']['click_count'] = 0;
            $_POST['Item']['wish_count'] = 0;
        }
        if (isset($_POST['ItemImg'])) {
            $itemImgs = $_POST['ItemImg'];
            unset($_POST['ItemImg']);
            $_POST['ItemProp']['ItemImgs'] = array();
            if (is_array($itemImgs['pic']) && $count = count($itemImgs['value_name'])) {
                for ($i = 0; $i < $count; $i++) {
                    $_POST['ItemProp']['ItemImgs'][] = array(
                        'item_img_id' => $itemImgs['item_img_id'][$i],
                        'pic' => $itemImgs['pic'][$i],
                        'position' => $i,
                    );
                }
            }
        }
    }
}
