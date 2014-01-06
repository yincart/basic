<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_method_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->payment_method_id), array('view', 'id'=>$data->payment_method_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('config')); ?>:</b>
	<?php echo CHtml::encode($data->config); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enabled')); ?>:</b>
	<?php echo CHtml::encode($data->enabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_cod')); ?>:</b>
	<?php echo CHtml::encode($data->is_cod); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_online')); ?>:</b>
	<?php echo CHtml::encode($data->is_online); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	*/ ?>

</div>