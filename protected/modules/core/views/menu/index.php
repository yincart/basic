<?php
$this->breadcrumbs=array(
    Yii::t('main','Menus'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Menus'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Manage Menus'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Menus');?> </h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
