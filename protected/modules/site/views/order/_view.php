<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->order_id), array('view', 'id'=>$data->order_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_status')); ?>:</b>
	<?php echo CHtml::encode($data->pay_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_status')); ?>:</b>
	<?php echo CHtml::encode($data->ship_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('refund_status')); ?>:</b>
	<?php echo CHtml::encode($data->refund_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_fee')); ?>:</b>
	<?php echo CHtml::encode($data->total_fee); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_fee')); ?>:</b>
	<?php echo CHtml::encode($data->ship_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_fee')); ?>:</b>
	<?php echo CHtml::encode($data->pay_fee); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_method')); ?>:</b>
	<?php echo CHtml::encode($data->pay_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_method')); ?>:</b>
	<?php echo CHtml::encode($data->ship_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_name')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_country')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_state')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_state); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_city')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_district')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_district); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_address')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_zip')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_zip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_phone')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('memo')); ?>:</b>
	<?php echo CHtml::encode($data->memo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pay_time')); ?>:</b>
	<?php echo CHtml::encode($data->pay_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_time')); ?>:</b>
	<?php echo CHtml::encode($data->ship_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	*/ ?>

</div>