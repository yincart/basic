<?php
$this->breadcrumbs=array(
	'Shippings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Shipping', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Shipping', 'icon'=>'plus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('shipping-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Shippings</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'shipping-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ship_id',
		'order_id',
		'user_id',
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
