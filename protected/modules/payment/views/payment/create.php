<?php
$this->breadcrumbs=array(
    Yii::t('main','Payments')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Payments List'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage Payments'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Payments');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>