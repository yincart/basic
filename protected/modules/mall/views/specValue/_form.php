<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'spec-value-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'spec_id'); ?>
		<?php echo $form->textField($model,'spec_id'); ?>
		<?php echo $form->error($model,'spec_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spec_value'); ?>
		<?php echo $form->textField($model,'spec_value',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'spec_value'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spec_image'); ?>
		<?php echo $form->textField($model,'spec_image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'spec_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
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