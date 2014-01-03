<?php
echo $form->textFieldControlGroup($model, 'title');
echo $form->textFieldControlGroup($model, 'stock', array('help' => '库存默认为1000'));
echo $form->textFieldControlGroup($model, 'min_number', array('help' => '最少订货量默认为1'));
echo $form->textFieldControlGroup($model, 'price');
echo $form->dropDownListControlGroup($model, 'currency', array('$' => '美元', '￥' => '人民币'));
echo $form->textFieldControlGroup($model, 'outer_id');
echo $form->dropDownListControlGroup($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English'));
$url = Yii::app()->createUrl('mall/item/getChildAreas');
list($countryAreas, $stateAreas, $citeAreas) = $model->getAreas();
echo $form->dropDownListControlGroup($model, 'country', $countryAreas,
    array('class' => 'area area-country', 'data-child-area' => 'area-state', 'data-url' => $url));
echo $form->dropDownListControlGroup($model, 'state', $stateAreas, array('class' => 'area area-state', 'data-child-area' => 'area-city', 'data-url' => $url));
echo $form->dropDownListControlGroup($model, 'city', $citeAreas, array('class' => 'area-city'));
?>