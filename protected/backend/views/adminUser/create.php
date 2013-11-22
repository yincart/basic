<?php
$this->breadcrumbs=array(
	'Admin Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'管理员列表', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>创建管理员</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>