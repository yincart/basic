<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textField($model,'currency_id',array('class'=>'span5')); ?>

		<?php echo $form->textField($model,'code',array('class'=>'span5','maxlength'=>8)); ?>

		<?php echo $form->textField($model,'name',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textField($model,'sign',array('class'=>'span5','maxlength'=>5)); ?>

		<?php echo $form->textField($model,'rate',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textField($model,'is_default',array('class'=>'span5')); ?>

		<?php echo $form->textField($model,'enabled',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::resetButton('Reset'),
        ));?>
	</div>

<?php $this->endWidget(); ?>
