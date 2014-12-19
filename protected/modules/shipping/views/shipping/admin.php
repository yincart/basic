<?php
$this->breadcrumbs=array(
    Yii::t('main','Shipping')=>array('index'),
    Yii::t('main','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Shipping'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Shipping'), 'icon'=>'plus','url'=>array('create')),
);
?>

<h1><?php echo Yii::t('main','Manage Shipping');?></h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'shipping-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ship_id',
		'order_id',
//		'user_id',
		'ship_sn',
		'type',
		'ship_method',
		/*
		'ship_fee',
		'op_name',
		'status',
		'receiver_name',
		'receiver_phone',
		'receiver_mobile',
		'location',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
