<?php
$this->breadcrumbs=array(
	'Refunds'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Refund','url'=>array('index')),
	array('label'=>'Create Refund','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('refund-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Refunds</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'refund-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'refund_id',
		'refund_sn',
		'money',
		'currency',
		'order_id',
		'pay_method',
		/*
		'user_id',
		'account',
		'bank',
		'refund_account',
		'status',
		'create_time',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
