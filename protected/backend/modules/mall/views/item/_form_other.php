<?php
echo $form->textFieldControlGroup($model, 'shipping_fee');
echo $form->radioButtonListControlGroup($model, 'is_show', array('1' => '是', '0' => '否'));
echo $form->radioButtonListControlGroup($model, 'is_promote', array('1' => '是', '0' => '否'));
echo $form->radioButtonListControlGroup($model, 'is_new', array('1' => '是', '0' => '否'));
echo $form->radioButtonListControlGroup($model, 'is_hot', array('1' => '是', '0' => '否'));
echo $form->radioButtonListControlGroup($model, 'is_best', array('1' => '是', '0' => '否'));
?>