<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'newsletter-subscriber-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'customer_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>150)); ?>

	<?php echo $form->dropDownListRow($model,'status', array('1'=>'是', '0'=>'否'), array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'confirm_code',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'change_status_at',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
