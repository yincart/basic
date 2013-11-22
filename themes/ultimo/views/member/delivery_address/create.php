<?php
$this->breadcrumbs=array(
	'收货地址'=>array('admin'),
	'添加',
);
?>

<div class="box">
    <div class="box-title">添加收货地址</div>
    <div class="box-content">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>