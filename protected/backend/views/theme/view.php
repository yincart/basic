<?php
$this->breadcrumbs=array(
	'Themes'=>array('index'),
    $model->name=>array('view','id'=>$model->theme),
    'View',
);

$this->menu=array(
	array('label'=>'List Theme','icon'=>'list','url'=>array('index')),
	array('label'=>'Create Theme','icon'=>'plus','url'=>array('create')),
	array('label'=>'Update Theme','icon'=>'pencil','url'=>array('update','id'=>$model->theme)),
	array('label'=>'Delete Theme','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->theme),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Theme','icon'=>'cog','url'=>array('admin')),
    array('label'=>'Set Theme','icon'=>'cog','url'=>array('set','id'=>$model->theme)),
);
?>

<h1>View Theme #<?php echo $model->theme; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'theme',
		'name',
		'author',
		'site',
		'update_url',
		'desc',
		'config',
        array(
            'name'=>'create_time',
            'value'=>date('Y-m-d', $model->create_time)
        ),
        array(
            'name'=>'update_time',
            'value'=>date('Y-m-d', $model->update_time)
        ),
	),
)); ?>
