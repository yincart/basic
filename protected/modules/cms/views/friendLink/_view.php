<?php
/* @var $this FriendLinkController */
/* @var $data FriendLink */
?>

<div class="view">
   <div class="container" id="friendLink-table">
    <table class="table table-bordered table-striped table-hover" >
    <tr>
    	<td class="col-xs-6"><b><?php echo CHtml::encode($data->getAttributeLabel('link_id')); ?>:</b></td>
	<td class="col-xs-6"><?php echo CHtml::link(CHtml::encode($data->link_id),array('view','id'=>$data->link_id)); ?></td>

    </tr>
    <tr>
	<td class="col-xs-6"><b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b></td>
	<td><?php echo CHtml::encode($data->category_id); ?></td>

    </tr>
    <tr>
	<td class="col-xs-6"><b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b></td>
	<td><?php echo CHtml::encode($data->title); ?></td>
     </tr>
     <tr>
	 <td class="col-xs-6"><b><?php echo CHtml::encode($data->getAttributeLabel('pic')); ?>:</b></td>
	<td class="col-xs-6"><?php echo CHtml::encode($data->pic); ?></td>
     <tr>

	<td class="col-xs-6"><b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b></td>
	<td class="col-xs-6"><?php echo CHtml::encode($data->url); ?></td>
    </tr>
     <tr>

<td class="col-xs-6">	<b><?php echo CHtml::encode($data->getAttributeLabel('memo')); ?>:</b></td>
<td class="col-xs-6">	<?php echo CHtml::encode($data->memo); ?></td>
     </tr>
     <tr>

<td class="col-xs-6">	<b><?php echo CHtml::encode($data->getAttributeLabel('sort_order')); ?>:</b></td>
<td class="col-xs-6">	<?php echo CHtml::encode($data->sort_order); ?></td>

     </tr>
     <tr>
	<?php /*
<td class="col-xs-6">	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b></td>
<td class="col-xs-6">	<?php echo CHtml::encode($data->language); ?></td>
    </tr>
     <tr>

<td class="col-xs-6">	<b><?php echo CHtml::encode($data->getAttributeLabel('create_time')); ?>:</b></td>
<td class="col-xs-6">	<?php echo CHtml::encode($data->create_time); ?></td>
    </tr>
     <tr>

<td class="col-xs-6">	<b><?php echo CHtml::encode($data->getAttributeLabel('update_time')); ?>:</b></td>
<td class="col-xs-6">	<?php echo CHtml::encode($data->update_time); ?></td>

    </tr>

	*/ ?>
</table>
</div>
</div>