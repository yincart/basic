<?php
$this->breadcrumbs=array(
    Yii::t('main','Menus')=>array('index'),
    Yii::t('main','Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Manage Menus'), 'icon'=>'cog', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Menus');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>