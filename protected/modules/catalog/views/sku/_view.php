<?php
/* @var $this SkuController */
/* @var $data Sku */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sku_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sku_id), array('view', 'id'=>$data->sku_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_id')); ?>:</b>
	<?php echo CHtml::encode($data->item_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('props')); ?>:</b>
	<?php echo CHtml::encode($data->props); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('props_name')); ?>:</b>
	<?php echo CHtml::encode($data->props_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('quantity')); ?>:</b>
	<?php echo CHtml::encode($data->quantity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('outer_id')); ?>:</b>
	<?php echo CHtml::encode($data->outer_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>