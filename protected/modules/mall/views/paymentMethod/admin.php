<?php
$this->breadcrumbs=array(
    Yii::t('main','Payments Methods')=>array('index'),
    Yii::t('main','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Payments Methods List'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create Payments Methods'), 'icon'=>'plus','url'=>array('create')),
);
?>

<h1><?php echo Yii::t('main','Payments Methods');?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'payment-method-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'payment_method_id',
//		'code',
		'name',
		'desc',
//		'config',
        array(
            'name' => 'enabled',
            'value' => 'Tbfunction::showYesOrNo($data->enabled)',
            'filter' => Tbfunction::ReturnYesOrNo(),
        ),
		/*
		'is_cod',
		'is_online',
		'sort_order',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
