<?php
echo $form->textFieldControlGroup($model, 'title', array('class'=>'span8'));
if($model->stock) {
    echo  $form->textFieldControlGroup($model, 'stock', array('help' => '库存默认为1000','readonly' => true));
}

//echo  $form->textFieldControlGroup($model, 'min_number', array('help' => '最少订货量默认为1'));
echo  $form->textFieldControlGroup($model, 'price');
$currency = Currency::model()->findAll();
$currency_list = CHtml::listData($currency, 'currency_id', 'name');
echo  $form->dropDownListControlGroup($model, 'currency', $currency_list);
//echo  $form->textFieldControlGroup($model, 'outer_id');
$language = Language::model()->findAll();
$language_list = CHtml::listData($language, 'language_id', 'name');
echo  $form->dropDownListControlGroup($model, 'language', $language_list);
//$url = Yii::app()->createUrl('mall/item/getChildAreas');
//list($countryAreas, $stateAreas, $citeAreas) = $model->getAreas();
//echo  $form->dropDownListControlGroup($model, 'country', $countryAreas,
//    array('class' => 'area area-country', 'data-child-area' => 'area-state', 'data-url' => $url));
//echo  $form->dropDownListControlGroup($model, 'state', $stateAreas, array('class' => 'area area-state', 'data-child-area' => 'area-city', 'data-url' => $url));
//echo  $form->dropDownListControlGroup($model, 'city', $citeAreas, array('class' => 'area-city'));
//echo  $form->textFieldControlGroup($model, 'Keywords');
//echo  $form->textFieldControlGroup($model, 'description' );
//echo  $form->textFieldControlGroup($model, 'title1');
?>



