<?php
$this->breadcrumbs=array(
    Yii::t('main', 'ItemSku')=>array('admin'),
    Yii::t('main', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Manage ItemSku'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create ItemSku');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'props'=>$props)); ?>