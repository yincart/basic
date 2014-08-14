<?php
$this->breadcrumbs=array(
    Yii::t('main', 'List Flash Ads')=>array('admin'),
    Yii::t('main', 'Create'),
);

$this->menu=array(
	array('label'=>Yii::t('main', 'Manage Flash Ads'), 'icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Create Flash Ads');?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>