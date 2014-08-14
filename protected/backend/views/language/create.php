<?php
$this->breadcrumbs=array(
    Yii::t('main','Languages')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Languages'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage Languages'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Languages');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>