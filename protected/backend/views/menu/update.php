<?php
$this->breadcrumbs=array(
	'Menus'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'创建菜单','icon'=>'plus','url'=>array('create')),
	array('label'=>'查看菜单','icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>'管理菜单','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>更新菜单 <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>