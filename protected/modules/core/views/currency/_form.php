<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'currency-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'code',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldControlGroup($model,'sign',array('class'=>'span5','maxlength'=>5)); ?>

	<?php echo $form->textFieldControlGroup($model,'rate',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'is_default',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'enabled',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php  echo TbHtml::formActions(array(
        TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        TbHtml::resetButton('Reset'),
    ));?>
</div>

<?php $this->endWidget(); ?>
