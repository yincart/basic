<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-log-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id'); ?>
		<?php echo $form->error($model,'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'op_id'); ?>
		<?php echo $form->textField($model,'op_id'); ?>
		<?php echo $form->error($model,'op_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'op_name'); ?>
		<?php echo $form->textField($model,'op_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'op_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'log_text'); ?>
		<?php echo $form->textArea($model,'log_text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'log_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'action_time'); ?>
		<?php echo $form->textField($model,'action_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'action_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'behavior'); ?>
		<?php echo $form->textField($model,'behavior',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'behavior'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'result'); ?>
		<?php echo $form->textField($model,'result',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'result'); ?>
	</div>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->