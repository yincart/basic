<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'payment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_sn'); ?>
		<?php echo $form->textField($model,'payment_sn',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'payment_sn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'money'); ?>
		<?php echo $form->textField($model,'money',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'money'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency'); ?>
		<?php echo $form->textField($model,'currency',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'payment_method_id'); ?>
		<?php echo $form->textField($model,'payment_id',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'payment_method_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'account'); ?>
		<?php echo $form->textField($model,'account',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'account'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bank'); ?>
		<?php echo $form->textField($model,'bank',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'bank'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pay_account'); ?>
		<?php echo $form->textField($model,'pay_account',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'pay_account'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'create_time'); ?>
	</div>
    <div class="form-actions">
        <?php  echo TbHtml::formActions(array(
            TbHtml::submitButton('Submit', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
            TbHtml::resetButton('Reset'),
        )); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->