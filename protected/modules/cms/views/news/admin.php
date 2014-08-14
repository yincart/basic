<?php
$this->breadcrumbs=array(
    Yii::t('main','News')=>array('index'),
    Yii::t('main','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create News'), 'icon'=>'plus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('post-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('main','News') ?></h1>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'category.name',
		'author',
		'title',
        'content',
        'tags',
		'source',
        'language',
        'pic_url',
//		'views',
//		'create_time',
//		'update_time',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>