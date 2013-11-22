<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'refund_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'refund_sn',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'money',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'currency',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'order_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'pay_method',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'account',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'bank',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'refund_account',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldRow($model,'create_time',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
