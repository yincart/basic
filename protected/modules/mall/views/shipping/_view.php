<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ship_id), array('view', 'id'=>$data->ship_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_sn')); ?>:</b>
	<?php echo CHtml::encode($data->ship_sn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_method')); ?>:</b>
	<?php echo CHtml::encode($data->ship_method); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ship_fee')); ?>:</b>
	<?php echo CHtml::encode($data->ship_fee); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('op_name')); ?>:</b>
	<?php echo CHtml::encode($data->op_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_name')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_phone')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receiver_mobile')); ?>:</b>
	<?php echo CHtml::encode($data->receiver_mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b>
	<?php echo CHtml::encode($data->create_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b>
	<?php echo CHtml::encode($data->update_time); ?>
	<br />

	*/ ?>

</div>