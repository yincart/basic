<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'prop_id'); ?>
		<?php echo $form->textField($model,'prop_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_prop_id'); ?>
		<?php echo $form->textField($model,'parent_prop_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parent_value_id'); ?>
		<?php echo $form->textField($model,'parent_value_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prop_name'); ?>
		<?php echo $form->textField($model,'prop_name',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prop_alias'); ?>
		<?php echo $form->textField($model,'prop_alias',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_key_prop'); ?>
		<?php echo $form->textField($model,'is_key_prop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_sale_prop'); ?>
		<?php echo $form->textField($model,'is_sale_prop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_color_prop'); ?>
		<?php echo $form->textField($model,'is_color_prop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_enum_prop'); ?>
		<?php echo $form->textField($model,'is_enum_prop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_item_prop'); ?>
		<?php echo $form->textField($model,'is_item_prop'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'must'); ?>
		<?php echo $form->textField($model,'must'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'multi'); ?>
		<?php echo $form->textField($model,'multi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'prop_values'); ?>
		<?php echo $form->textArea($model,'prop_values',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->