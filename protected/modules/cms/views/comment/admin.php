<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Comments')=>array('index'),
    Yii::t('main', 'Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'List Comments'), 'icon'=>'list', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Create Comments'), 'icon'=>'plus', 'icon'=>'plus','url'=>array('create')),
);
?>

<h1><?php echo Yii::t('main','Manage Comments');?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'comment-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'content',
		'status',
		'create_time',
		'author',
		'email',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
