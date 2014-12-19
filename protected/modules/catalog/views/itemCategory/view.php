<?php
$this->breadcrumbs=array(
    Yii::t('main','ItemSku')=>array('index'),
	$model->name=>array('view','id'=>$model->category_id),
    Yii::t('main','View'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create ItemSku'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Update ItemSku'),'icon'=>'eye-open','url'=>array('update','id'=>$model->category_id)),
	array('label'=>Yii::t('main','Manage ItemSku'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update ItemSku');?> #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model, 'is_view' => true)); ?>