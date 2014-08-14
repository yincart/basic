<?php
$this->breadcrumbs=array(
    Yii::t('main', 'Content Category')=>array('index'),
    Yii::t('main', 'Update'),
);

$this->menu=array(
	array('label'=> Yii::t('main', 'Manage Content Category'), 'icon'=>'cog','icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Content Category');?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>