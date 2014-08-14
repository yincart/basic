<?php
$this->breadcrumbs=array(
    Yii::t('main','News')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List News'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage News'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create News') ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>