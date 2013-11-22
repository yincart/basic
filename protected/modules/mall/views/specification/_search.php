<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'spec_id'); ?>
		<?php echo $form->textField($model,'spec_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spec_name'); ?>
		<?php echo $form->textField($model,'spec_name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spec_show_type'); ?>
		<?php echo $form->textField($model,'spec_show_type',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spec_type'); ?>
		<?php echo $form->textArea($model,'spec_type',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spec_memo'); ?>
		<?php echo $form->textField($model,'spec_memo',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disabled'); ?>
		<?php echo $form->textField($model,'disabled',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->