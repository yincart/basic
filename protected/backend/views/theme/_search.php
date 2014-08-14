<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'theme',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'author',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'site',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldControlGroup($model,'update_url',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textAreaControlGroup($model,'desc',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'config',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldControlGroup($model,'create_time',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'update_time',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::resetButton('Reset'),
        ));; ?>
	</div>

<?php $this->endWidget(); ?>
