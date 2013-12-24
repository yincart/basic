<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->name=>array('view','id'=>$model->category_id),
	'View',
);

$this->menu=array(
	array('label'=>'创建分类','icon'=>'plus','url'=>array('create')),
	array('label'=>'更新分类','icon'=>'eye-open','url'=>array('update','id'=>$model->category_id)),
	array('label'=>'管理分类','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Update Category <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'is_view' => true)); ?>