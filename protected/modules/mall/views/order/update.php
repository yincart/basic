<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id=>array('view','id'=>$model->order_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Order', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Order', 'icon'=>'plus','url'=>array('create')),
	array('label'=>'View Order', 'url'=>array('view', 'id'=>$model->order_id)),
	array('label'=>'Manage Order', 'icon'=>'cog','url'=>array('admin')),
);
?>
    <link type="text/css" rel="stylesheet"
          href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css"/>



    <h1 style="text-align:center">Update Order <?php echo $model->order_id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>