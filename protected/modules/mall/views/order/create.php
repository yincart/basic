<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Create',
);
?>

    <h1 style="text-align:center">Create Order</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'order_item'=>$order_item)); ?>