<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'item_id'); ?>
		<?php echo $form->textField($model,'item_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php echo $form->textField($model,'category_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sn'); ?>
		<?php echo $form->textField($model,'sn',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unit'); ?>
		<?php echo $form->textField($model,'unit',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stock'); ?>
		<?php echo $form->textField($model,'stock'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'min_number'); ?>
		<?php echo $form->textField($model,'min_number',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'market_price'); ?>
		<?php echo $form->textField($model,'market_price',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shop_price'); ?>
		<?php echo $form->textField($model,'shop_price',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skus'); ?>
		<?php echo $form->textArea($model,'skus',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'props'); ?>
		<?php echo $form->textArea($model,'props',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'props_name'); ?>
		<?php echo $form->textArea($model,'props_name',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'item_imgs'); ?>
		<?php echo $form->textArea($model,'item_imgs',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prop_imgs'); ?>
		<?php echo $form->textArea($model,'prop_imgs',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pic_url'); ?>
		<?php echo $form->textField($model,'pic_url',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desc'); ?>
		<?php echo $form->textArea($model,'desc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'post_fee'); ?>
		<?php echo $form->textField($model,'post_fee',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'express_fee'); ?>
		<?php echo $form->textField($model,'express_fee',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ems_fee'); ?>
		<?php echo $form->textField($model,'ems_fee',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_show'); ?>
		<?php echo $form->textField($model,'is_show'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_promote'); ?>
		<?php echo $form->textField($model,'is_promote'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_new'); ?>
		<?php echo $form->textField($model,'is_new'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_hot'); ?>
		<?php echo $form->textField($model,'is_hot'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_best'); ?>
		<?php echo $form->textField($model,'is_best'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_discount'); ?>
		<?php echo $form->textField($model,'is_discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'click_count'); ?>
		<?php echo $form->textField($model,'click_count',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->