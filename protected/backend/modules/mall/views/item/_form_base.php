<?php
echo $form->textFieldControlGroup($model, 'title');
echo $form->textFieldControlGroup($model, 'stock', array('help' => '库存默认为1000'));
echo $form->textFieldControlGroup($model, 'min_number', array('help' => '最少订货量默认为1'));
echo $form->textFieldControlGroup($model, 'price');
echo $form->dropDownListControlGroup($model, 'currency', array('$' => '美元', '￥' => '人民币'));
echo $form->dropDownListControlGroup($model, 'language', array('zh_cn' => '中文', 'en_us' => 'English'));
?>