<?php
$this->breadcrumbs=array(
    Yii::t('main','News'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create News'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Manage News'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
