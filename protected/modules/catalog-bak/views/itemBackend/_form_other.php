<?php
echo $is_view ?  $form->uneditableFieldControlGroup($model, 'shipping_fee')  : $form->textFieldControlGroup($model, 'shipping_fee');
foreach (array('is_show' => 'allShow','is_promote' => 'allPromote','is_new' => 'allNew','is_hot' => 'allHot','is_best' => 'allBest') as $key => $value) {
    echo $is_view ? $form->inlineRadioButtonListControlGroup($model, $key, call_user_func(array($model, $value)),array('disabled'=>true)): $form->inlineRadioButtonListControlGroup($model, $key, call_user_func(array($model, $value)));
}
?>