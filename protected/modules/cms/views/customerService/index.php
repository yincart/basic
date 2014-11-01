<?php
/* @var $this CustomerServiceController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
    Yii::t('main','CustomerService'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create CustomerService'), 'icon'=>'plus', 'url'=>array('create')),
	array('label'=>Yii::t('main','Manage CustomerService'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>