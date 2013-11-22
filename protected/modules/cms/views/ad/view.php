<?php
$this->breadcrumbs=array(
	'Flash Ads'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Create FlashAd', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update FlashAd', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FlashAd', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FlashAd', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View FlashAd #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'pic',
		'url',
                'content:html',
		'sort_order',
	),
)); ?>