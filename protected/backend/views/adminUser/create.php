<?php
$this->breadcrumbs=array(
    Yii::t('main','Admin Users')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','List Admin Users'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Admin Users');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>