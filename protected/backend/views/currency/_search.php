<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'currency_id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>8)); ?>

		<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>20)); ?>

		<?php echo $form->textFieldRow($model,'sign',array('class'=>'span5','maxlength'=>5)); ?>

		<?php echo $form->textFieldRow($model,'rate',array('class'=>'span5','maxlength'=>10)); ?>

		<?php echo $form->textFieldRow($model,'is_default',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'enabled',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
