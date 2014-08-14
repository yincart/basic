<?php
$this->breadcrumbs=array(
    Yii::t('main', 'List Flash Ads')=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
    Yii::t('main', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'Create Flash Ads'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main', 'View Flash Ads'), 'icon'=>'eye-open','url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('main', 'Manage Flash Ads'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Flash Ads');?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>