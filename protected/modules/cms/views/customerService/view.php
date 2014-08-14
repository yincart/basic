<?php
/* @var $this CustomerServiceController */
/* @var $model CustomerService */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','CustomerService')=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('main','List CustomerService'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create CustomerService'), 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>Yii::t('main','Update CustomerService '), 'icon'=>'pencil', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('main','Delete CustomerService'), 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','Manage CustomerService'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View CustomerService')?> #<?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'category_id',
		'type',
		'nick_name',
		'account',
		'is_show',
		'sort_order',
	),
)); ?>