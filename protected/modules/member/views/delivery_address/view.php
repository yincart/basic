<?php
$this->breadcrumbs=array(
	'收货地址'=>array('admin'),
	'详细地址#'.$model->contact_id,
);

//$this->menu=array(
//	array('label'=>'List AddressResult', 'url'=>array('index')),
//	array('label'=>'Create AddressResult', 'url'=>array('create')),
//	array('label'=>'Update AddressResult', 'url'=>array('update', 'id'=>$model->contact_id)),
//	array('label'=>'Delete AddressResult', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->contact_id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage AddressResult', 'url'=>array('admin')),
//);
?>

<div class="box">
    <div class="box-title">查看收货地址#<?php echo $model->contact_id; ?></div>
    <div class="box-content">
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'contact_id',
		'user_id',
		'contact_name',
//		'country',
		's.name',
		'c.name',
		'd.name',
		'zipcode',
		'address',
		'phone',
		'mobile_phone',
		'memo',
		'is_default',
		'create_time',
		'update_time',
	),
)); ?>
    </div>
</div>