<?php
$this->breadcrumbs=array(
	'Spec Values'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SpecValue', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create SpecValue', 'icon'=>'plus','url'=>array('create')),
);
?>

<h1>Manage Spec Values</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'spec-value-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'spec_value_id',
		'spec_id',
		'spec_value',
		'spec_image',
		'sort_order',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
