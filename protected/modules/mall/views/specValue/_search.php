<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'spec_value_id'); ?>
		<?php echo $form->textField($model,'spec_value_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spec_id'); ?>
		<?php echo $form->textField($model,'spec_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spec_value'); ?>
		<?php echo $form->textField($model,'spec_value',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spec_image'); ?>
		<?php echo $form->textField($model,'spec_image',array('size'=>60,'maxlength'=>255)); ?>
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