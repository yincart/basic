<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->value_id), array('view', 'id'=>$data->value_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_name')); ?>:</b>
	<?php echo CHtml::encode($data->value_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prop_id')); ?>:</b>
	<?php echo CHtml::encode($data->prop_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prop_name')); ?>:</b>
	<?php echo CHtml::encode($data->prop_name); ?>
	<br />


</div>