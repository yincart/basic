<?php
$this->breadcrumbs=array(
	'收货地址'=>array('admin'),
	'详细地址#'.$model->contact_id=>array('view','id'=>$model->contact_id),
	'更新',
);

$this->menu=array(
	array('label'=>'List AddressResult', 'url'=>array('index')),
	array('label'=>'Create AddressResult', 'url'=>array('create')),
	array('label'=>'View AddressResult', 'url'=>array('view', 'id'=>$model->contact_id)),
	array('label'=>'Manage AddressResult', 'url'=>array('admin')),
);
?>

<div class="box">
    <div class="box-title">更新收货地址#<?php echo $model->contact_id; ?></div>
    <div class="box-content">
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>