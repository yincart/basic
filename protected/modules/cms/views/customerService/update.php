<?php
/* @var $this CustomerServiceController */
/* @var $model CustomerService */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','CustomerService')=>array('index'),
    Yii::t('main', 'Update'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List CustomerService'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Create CustomerService'), 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>Yii::t('main','View CustomerService'), 'icon'=>'eye-open', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>Yii::t('main','Manage CustomerService'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>