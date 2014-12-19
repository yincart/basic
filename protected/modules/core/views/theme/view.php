<?php
$this->breadcrumbs=array(
    Yii::t('main','Themes')=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('main','List Themes'),'icon'=>'list','url'=>array('index')),
	array('label'=>Yii::t('main','Create Themes'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update Themes'),'icon'=>'pencil','url'=>array('update','id'=>$model->theme_id)),
	array('label'=>Yii::t('main',' Themes'),'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->theme_id),'confirm'=>'Are you sure you want to delete this item?','params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('main','Delete Themes'),'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->theme_id),'confirm'=>'Are you sure you want to delete this item?','params'=> array('YII_CSRF_TOKEN' => Yii::app()->request->csrfToken))),
	array('label'=>Yii::t('main','Manage Themes'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','View Themes');?> #<?php echo $model->theme; ?></h1>

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
            'name' => 'create_time',
            'value' => date("Y年m月d日 H:i:s",$model->create_time),
        ),
        array(
            'name' => 'update_time',
            'value' => date("Y年m月d日 H:i:s",$model->update_time),
        ),
	),
)); ?>
