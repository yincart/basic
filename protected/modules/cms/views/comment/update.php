<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Comments')=>array('index'),
	$model->id=>array('view','id'=>$model->id),
    Yii::t('main', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'List Comments'),'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Create Comments'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','View Comments'),'icon'=>'eye-open','url'=>array('view','id'=>$model->id)),
	array('label'=>Yii::t('main', 'Manage Comments'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Comments');?> <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>