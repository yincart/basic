<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'theme-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'theme',array('class'=>'span5','maxlength'=>50, 'hint'=>'和www/themes目录的名称一样')); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'author',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'site',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldControlGroup($model,'update_url',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaControlGroup($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'config',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<div class="form-actions">
		<?php  echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::resetButton('Reset'),
        )); ?>
	</div>

<?php $this->endWidget(); ?>
