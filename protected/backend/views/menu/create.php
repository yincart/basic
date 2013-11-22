<?php
$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'菜单管理', 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1>创建菜单</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>