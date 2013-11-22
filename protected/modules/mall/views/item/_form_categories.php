<?php
$cri = new CDbCriteria(array(
    'condition'=>'id != 1',
    'order'=>'lft asc'
));
$data = StoreCategory::model()->findAll($cri);
$list = CHtml::listdata($data, 'id', 'name');

//if(!$model->isNewRecord){
//    $cri = new CDbCriteria(array(
//        'condition'=>'con_product_category_productid ='.$model->item_id,
//    ));
//    $categories = ProductCategories::model()->findAll($cri);
//    foreach($categories as $c) {
//        $category_ids[] = $c->con_product_category_categoryid;
//    }
//    echo Category::model()->getHtmlTree(1, $category_ids);
//}else{
////	    echo CHtml::checkBoxList('category', '', $list);
//    echo Category::model()->getHtmlTree(1);
//}

echo F::generatePassword(9);