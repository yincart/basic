<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'brand-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'value_id'); ?>
		<?php echo $form->textField($model,'value_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'value_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value_name'); ?>
		<?php echo $form->textField($model,'value_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'value_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prop_id'); ?>
		<?php echo $form->textField($model,'prop_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'prop_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'prop_name'); ?>
		<?php echo $form->textField($model,'prop_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'prop_name'); ?>
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