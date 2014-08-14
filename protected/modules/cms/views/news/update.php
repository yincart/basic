<?php
$this->breadcrumbs=array(
    Yii::t('main','News')=>array('index'),
	''=>array('view','id'=>$model->id),
    Yii::t('main','Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List News'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create News'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View News'), 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('main','Manage News'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update News') ?> #<?php echo $model->title; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>