<?php
$this->breadcrumbs=array(
    Yii::t('main','News')=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('main','List News'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create News'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update News'), 'icon'=>'pencil','url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('main','Delete News'), 'icon'=>'trash', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('main','Manage News'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View News') ?> #<?php echo $model->title; ?></h1>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'store_id',
		'category_id',
		'title',
		'source',
		'content:html',
		'views',
        'tags',
        'status',
        'author',
        'user_id',
        'url',
        'pic_url',
        'summary',
        'language',
		array(
            'name' => 'create_time',
            'value' => date("Y年m月d日 H:i:s",$model->create_time)
        ),
        array(
            'name' => 'update_time',
            'value' => date("Y年m月d日 H:i:s",$model->create_time )
        ),
	),
)); ?>
