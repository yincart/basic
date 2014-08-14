<?php
/* @var $this NewsletterSubscriberController */
/* @var $data NewsletterSubscriber */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('subscriber_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->subscriber_id),array('view','id'=>$data->subscriber_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('confirm_code')); ?>:</b>
	<?php echo CHtml::encode($data->confirm_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('change_status_at')); ?>:</b>
	<?php echo CHtml::encode($data->change_status_at); ?>
	<br />


</div>