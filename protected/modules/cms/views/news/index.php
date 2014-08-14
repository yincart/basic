<?php
$this->breadcrumbs=array(
    Yii::t('main','News'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create News'), 'icon'=>'plus','url'=>array('create')),
	array('label'=>Yii::t('main','Manage News'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','News') ?></h1>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
