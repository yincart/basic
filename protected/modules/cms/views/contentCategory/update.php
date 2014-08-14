<?php
$this->breadcrumbs = array(
    Yii::t('main', 'Content Category') => array('admin'),
    $model->name => array('view', 'id' => $model->category_id),
    Yii::t('main', 'Update'),
);

$this->menu = array(
    array('label' => Yii::t('main', 'Create Content Category'), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('main', 'Manage Content Category'), 'icon'=>'cog','icon'=>'cog','url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('main','Update Content Category');?> #<?php echo $model->category_id;?></h1>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>