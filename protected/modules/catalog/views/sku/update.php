<?php
/* @var $this SkuController */
/* @var $model Sku */

$this->breadcrumbs=array(
	'Skus'=>array('index'),
//	$model->sku_id=>array('view','id'=>$model->sku_id),
	'Update',
);

?>

<h1>Update Sku <?php echo $model->sku_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>