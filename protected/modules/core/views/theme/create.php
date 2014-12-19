<?php
$this->breadcrumbs=array(
    Yii::t('main','Themes')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Themes'), 'icon'=>'list', 'url'=>array('index')),
	array('label'=>Yii::t('main','Manage Themes'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Themes');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>