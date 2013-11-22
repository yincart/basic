<?php
$this->breadcrumbs = array(
    '商品列表' => array('list'),
    $model->title => array('view', 'id' => $model->item_id),
    '更新',
);

$this->menu = array(
    array('label' => '创建商品', 'icon' => 'plus', 'url' => array('create')),
    array('label' => '查看商品', 'icon' => 'eye-open', 'url' => array('view', 'id' => $model->item_id)),
    array('label' => '管理商品', 'icon' => 'cog', 'url' => array('list')),
);
?>

<div id="loading-header">
    <div class="header-row">
	    <header>
                <h3 class="header-main"><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;更新商品 #<?php echo $model->item_id; ?></h3>
	    </header>
    </div> <!-- /.header-row -->
</div>
<div class="col-lg-12 main-content">
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'image'=>$image, 'upload'=>$upload)); ?>
</div>