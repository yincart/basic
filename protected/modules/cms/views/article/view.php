<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Article', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Article', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'Update Article', 'icon'=>'pencil','url'=>array('update', 'id'=>$model->article_id)),
	array('label'=>'Delete Article', 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->article_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Article', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>View Article #<?php echo $model->article_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'article_id',
		'category_id',
		'author_id',
		'title',
		'from',
                'summary:html',
		'content:html',
		'views',
		'create_time',
		'update_time',
	),
)); ?>
