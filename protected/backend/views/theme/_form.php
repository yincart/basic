<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'theme-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'theme',array('class'=>'span5','maxlength'=>50, 'hint'=>'和www/themes目录的名称一样')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'author',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'site',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'update_url',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaRow($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaRow($model,'config',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
