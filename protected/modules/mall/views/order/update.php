<?php
//$this->breadcrumbs=array(
//	'Orders'=>array('index'),
//	$model->order_id=>array('view','id'=>$model->order_id),
//	'Update',
//);
?>

    <h1 style="text-align:center">Update Order <?php echo $model->order_id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>