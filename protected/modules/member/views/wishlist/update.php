<?php
$this->breadcrumbs=array(
	'我的收藏'=>array('admin'),
	$model->wishlist_id=>array('view','id'=>$model->wishlist_id),
	'更新',
);
?>

<div class="box">
    <div class="box-title">更新备注<?php echo $model->wishlist_id; ?></div>
    <div class="box-content">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>