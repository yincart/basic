<?php
$this->breadcrumbs=array(
    Yii::t('main','Currency'),
);

$this->menu=array(
array('label'=>Yii::t('main','Create Currency'),'icon'=>'plus','url'=>array('create')),
array('label'=>Yii::t('main','Manage Currency'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Currency');?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
