<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->title=>array('view','id'=>$model->article_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Article', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Article', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View Article', 'url'=>array('view', 'id'=>$model->article_id)),
	array('label'=>'Manage Article', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Article <?php echo $model->article_id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>