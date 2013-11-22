<?php
$this->breadcrumbs=array(
	'案例'=>array('index'),
	'创建',
);

$this->menu=array(
	array('label'=>'管理案例', 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1>创建案例</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>