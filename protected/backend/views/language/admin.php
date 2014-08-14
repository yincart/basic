<?php
$this->breadcrumbs=array(
    Yii::t('main','Languages')=>array('index'),
    Yii::t('main','Manage')
);

$this->menu=array(
	array('label'=>Yii::t('main','List Languages'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Languages'), 'icon'=>'plus', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('language-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('main','Manage Languages');?></h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>


<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'language-grid',
    	'dataProvider'=>$model->search(),
    	'filter'=>$model,
    	'columns'=>array(
    		'language_id',
    		'code',
    		'name',
    		array(
    			'class'=>'bootstrap.widgets.TbButtonColumn',
    		),
    	),
)); ?>
