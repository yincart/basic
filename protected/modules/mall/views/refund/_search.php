<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldControlGroup($model,'refund_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'refund_sn',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'money',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldControlGroup($model,'currency',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldControlGroup($model,'order_id',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldControlGroup($model,'pay_method',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'user_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'account',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'bank',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'refund_account',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'status',array('class'=>'span5','maxlength'=>8)); ?>

	<?php echo $form->textFieldControlGroup($model,'create_time',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php  echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::resetButton('Reset'),
        )); ?>
	</div>

<?php $this->endWidget(); ?>
