<?php
$this->breadcrumbs=array(
    Yii::t('main','Brands')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Brands'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage Brands'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Brands');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>