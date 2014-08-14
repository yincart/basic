<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Comments')=>array('index'),
    Yii::t('main', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'List Comments'),'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main', 'Manage Comments'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Comments');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>