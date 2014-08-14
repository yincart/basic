<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'order-form',
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
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_status'); ?>
		<?php echo $form->textField($model,'pay_status'); ?>
		<?php echo $form->error($model,'pay_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ship_status'); ?>
		<?php echo $form->textField($model,'ship_status'); ?>
		<?php echo $form->error($model,'ship_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'refund_status'); ?>
		<?php echo $form->textField($model,'refund_status'); ?>
		<?php echo $form->error($model,'refund_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_fee'); ?>
		<?php echo $form->textField($model,'total_fee',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'total_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ship_fee'); ?>
		<?php echo $form->textField($model,'ship_fee',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ship_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_fee'); ?>
		<?php echo $form->textField($model,'pay_fee',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'pay_fee'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_method'); ?>
		<?php echo $form->textField($model,'pay_method',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pay_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ship_method'); ?>
		<?php echo $form->textField($model,'ship_method',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'ship_method'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_name'); ?>
		<?php echo $form->textField($model,'receiver_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_country'); ?>
		<?php echo $form->textField($model,'receiver_country',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_country'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_state'); ?>
		<?php echo $form->textField($model,'receiver_state',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_city'); ?>
		<?php echo $form->textField($model,'receiver_city',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_city'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_district'); ?>
		<?php echo $form->textField($model,'receiver_district',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_district'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_address'); ?>
		<?php echo $form->textField($model,'receiver_address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'receiver_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_zip'); ?>
		<?php echo $form->textField($model,'receiver_zip',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_zip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_mobile'); ?>
		<?php echo $form->textField($model,'receiver_mobile',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_mobile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receiver_phone'); ?>
		<?php echo $form->textField($model,'receiver_phone',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'receiver_phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'memo'); ?>
		<?php echo $form->textArea($model,'memo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'memo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_time'); ?>
		<?php echo $form->textField($model,'pay_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'pay_time'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ship_time'); ?>
		<?php echo $form->textField($model,'ship_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ship_time'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->