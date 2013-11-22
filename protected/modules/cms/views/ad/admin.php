<?php
$this->breadcrumbs=array(
	'广告'=>array('admin'),
	'管理',
);

$this->menu=array(
	array('label'=>'创建广告', 'icon'=>'plus','url'=>array('create')),
);
?>
<h1>广告管理</h1>
<?php 
$this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'flash-ad-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'pic',
		'url',
                'theme',
		'sort_order',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>