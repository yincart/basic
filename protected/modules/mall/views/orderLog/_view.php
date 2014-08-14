<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->log_id), array('view', 'id'=>$data->log_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('order_id')); ?>:</b>
	<?php echo CHtml::encode($data->order_id); ?>
	<br />

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('op_id')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->op_id); ?>
<!--	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('op_name')); ?>:</b>
	<?php echo CHtml::encode($data->op_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('log_text')); ?>:</b>
	<?php echo CHtml::encode($data->log_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('action_time')); ?>:</b>
	<?php echo CHtml::encode($data->action_time); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	*/ ?>

</div>