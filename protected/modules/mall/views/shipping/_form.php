<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'shipping-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ship_sn'); ?>
		<?php echo $form->textField($model,'ship_sn',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ship_sn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ship_method'); ?>
		<?php echo $form->textField($model,'ship_method',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ship_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ship_fee'); ?>
		<?php echo $form->textField($model,'ship_fee',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ship_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'op_name'); ?>
		<?php echo $form->textField($model,'op_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'op_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_name'); ?>
		<?php echo $form->textField($model,'receiver_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_phone'); ?>
		<?php echo $form->textField($model,'receiver_phone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_mobile'); ?>
		<?php echo $form->textField($model,'receiver_mobile',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textArea($model,'location',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'update_time'); ?>
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