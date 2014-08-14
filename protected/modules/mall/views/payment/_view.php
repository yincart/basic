<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->payment_id), array('view', 'payment_id'=>$data->payment_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_sn')); ?>:</b>
	<?php echo CHtml::encode($data->payment_sn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('money')); ?>:</b>
	<?php echo CHtml::encode($data->money); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('currency')); ?>:</b>
	<?php echo CHtml::encode($data->currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('payment_method')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->payment_method); ?>
<!--	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('account')); ?>:</b>
	<?php echo CHtml::encode($data->account); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank')); ?>:</b>
	<?php echo CHtml::encode($data->bank); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_account')); ?>:</b>
	<?php echo CHtml::encode($data->pay_account); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	*/ ?>

</div>