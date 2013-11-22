<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'order_id'); ?>
		<?php echo $form->textField($model,'order_id',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_status'); ?>
		<?php echo $form->textField($model,'pay_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_status'); ?>
		<?php echo $form->textField($model,'ship_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'refund_status'); ?>
		<?php echo $form->textField($model,'refund_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_fee'); ?>
		<?php echo $form->textField($model,'total_fee',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_fee'); ?>
		<?php echo $form->textField($model,'ship_fee',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_fee'); ?>
		<?php echo $form->textField($model,'pay_fee',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_method'); ?>
		<?php echo $form->textField($model,'pay_method',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_method'); ?>
		<?php echo $form->textField($model,'ship_method',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiver_name'); ?>
		<?php echo $form->textField($model,'receiver_name',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiver_country'); ?>
		<?php echo $form->textField($model,'receiver_country',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiver_state'); ?>
		<?php echo $form->textField($model,'receiver_state',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiver_city'); ?>
		<?php echo $form->textField($model,'receiver_city',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiver_district'); ?>
		<?php echo $form->textField($model,'receiver_district',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiver_address'); ?>
		<?php echo $form->textField($model,'receiver_address',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiver_zip'); ?>
		<?php echo $form->textField($model,'receiver_zip',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiver_mobile'); ?>
		<?php echo $form->textField($model,'receiver_mobile',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receiver_phone'); ?>
		<?php echo $form->textField($model,'receiver_phone',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'memo'); ?>
		<?php echo $form->textArea($model,'memo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pay_time'); ?>
		<?php echo $form->textField($model,'pay_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ship_time'); ?>
		<?php echo $form->textField($model,'ship_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_time'); ?>
		<?php echo $form->textField($model,'create_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'update_time'); ?>
		<?php echo $form->textField($model,'update_time',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->