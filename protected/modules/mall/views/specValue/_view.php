<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_value_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->spec_value_id), array('view', 'id'=>$data->spec_value_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_id')); ?>:</b>
	<?php echo CHtml::encode($data->spec_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_value')); ?>:</b>
	<?php echo CHtml::encode($data->spec_value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_image')); ?>:</b>
	<?php echo CHtml::encode($data->spec_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />


</div>