<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->spec_id), array('view', 'id'=>$data->spec_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_name')); ?>:</b>
	<?php echo CHtml::encode($data->spec_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_show_type')); ?>:</b>
	<?php echo CHtml::encode($data->spec_show_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_type')); ?>:</b>
	<?php echo CHtml::encode($data->spec_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spec_memo')); ?>:</b>
	<?php echo CHtml::encode($data->spec_memo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b>
	<?php echo CHtml::encode($data->sort_order); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disabled')); ?>:</b>
	<?php echo CHtml::encode($data->disabled); ?>
	<br />


</div>