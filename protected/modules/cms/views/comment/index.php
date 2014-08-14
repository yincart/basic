<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Comments'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'Create Comments'),'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main', 'Manage Comments'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Comments');?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
