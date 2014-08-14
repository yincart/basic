<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('refund_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->refund_id),array('view','id'=>$data->refund_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refund_sn')); ?>:</b>
	<?php echo CHtml::encode($data->refund_sn); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_method')); ?>:</b>
	<?php echo CHtml::encode($data->pay_method); ?>
	<br />

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

	<b><?php echo CHtml::encode($data->getAttributeLabel('refund_account')); ?>:</b>
	<?php echo CHtml::encode($data->refund_account); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	*/ ?>

</div>