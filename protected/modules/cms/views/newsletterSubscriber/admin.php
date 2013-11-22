<?php
$this->breadcrumbs=array(
	'Newsletter Subscribers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'创建订阅', 'icon'=>'plus', 'url'=>array('create')),
);

?>

<h1>Manage Newsletter Subscribers</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'newsletter-subscriber-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'subscriber_id',
		'customer_id',
		'email',
		'status',
		'confirm_code',
		'change_status_at',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
