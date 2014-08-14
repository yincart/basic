<?php
$this->breadcrumbs=array(
    Yii::t('main','Currency')=>array('index'),
	Yii::t('main','Update'),
);

$this->menu=array(
array('label'=>Yii::t('main','List Currency'),'icon'=>'list','url'=>array('index')),
array('label'=>Yii::t('main','Manage Currency'),'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Currency');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>