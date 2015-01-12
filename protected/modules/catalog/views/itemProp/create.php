<?php
$this->breadcrumbs=array(
    Yii::t('main', 'ItemProp')=>array('admin'),
    Yii::t('main', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Manage ItemProp'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create ItemProp');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'props'=>$props)); ?>