<div class="wide form">

<?php
$form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
));
echo $form->textFieldControlGroup($model,'order_id');
echo $form->textFieldControlGroup($model,'user_id');
echo $form->textFieldControlGroup($model,'status');
echo $form->textFieldControlGroup($model,'pay_status');
echo $form->textFieldControlGroup($model,'ship_status');
echo $form->textFieldControlGroup($model,'refund_status');
echo $form->textFieldControlGroup($model,'total_fee');
echo $form->textFieldControlGroup($model,'ship_fee');
echo $form->textFieldControlGroup($model,'pay_fee');
echo $form->textFieldControlGroup($model,'payment_method_id');
echo $form->textFieldControlGroup($model,'receiver_name');
echo $form->textFieldControlGroup($model,'receiver_country');
echo $form->textFieldControlGroup($model,'receiver_state');
echo $form->textFieldControlGroup($model,'receiver_city');
echo $form->textFieldControlGroup($model,'receiver_district');
echo $form->textFieldControlGroup($model,'receiver_address');
echo $form->textFieldControlGroup($model,'receiver_zip');
echo $form->textFieldControlGroup($model,'receiver_mobile');
echo $form->textFieldControlGroup($model,'receiver_phone');
echo $form->textAreaControlGroup($model,'memo');
echo $form->textFieldControlGroup($model,'pay_time');
echo $form->textFieldControlGroup($model,'ship_time');
echo $form->textFieldControlGroup($model,'create_time');
echo $form->textFieldControlGroup($model,'update_time');


echo CHtml::submitButton('Search');
$this->endWidget();
?>
</div><!-- search-form -->