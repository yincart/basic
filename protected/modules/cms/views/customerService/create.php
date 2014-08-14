<?php
/* @var $this CustomerServiceController */
/* @var $model CustomerService */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','CustomerService')=>array('index'),
    Yii::t('main', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List CustomerService'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage CustomerService'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create CustomerService');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>