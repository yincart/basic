<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('prop_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->prop_id), array('view', 'id'=>$data->prop_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_prop_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_prop_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_value_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_value_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prop_name')); ?>:</b>
	<?php echo CHtml::encode($data->prop_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prop_alias')); ?>:</b>
	<?php echo CHtml::encode($data->prop_alias); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_key_prop')); ?>:</b>
	<?php echo CHtml::encode($data->is_key_prop); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('is_sale_prop')); ?>:</b>
	<?php echo CHtml::encode($data->is_sale_prop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_color_prop')); ?>:</b>
	<?php echo CHtml::encode($data->is_color_prop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_enum_prop')); ?>:</b>
	<?php echo CHtml::encode($data->is_enum_prop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_item_prop')); ?>:</b>
	<?php echo CHtml::encode($data->is_item_prop); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('must')); ?>:</b>
	<?php echo CHtml::encode($data->must); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('multi')); ?>:</b>
	<?php echo CHtml::encode($data->multi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prop_values')); ?>:</b>
	<?php echo CHtml::encode($data->prop_values); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	*/ ?>

</div>