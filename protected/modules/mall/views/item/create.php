<?php
$this->breadcrumbs=array(
	'商品列表'=>array('list'),
	'Create',
);

$this->menu=array(
array('label'=>'管理商品','icon'=>'cog','url'=>array('list')),
);
?>

<div id="loading-header">
    <div class="header-row">
	    <header>
                <h3 class="header-main"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;创建商品</h3>
	    </header>
    </div> <!-- /.header-row -->
</div>
<div class="col-lg-12 main-content">
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'image'=>$image, 'upload'=>$upload)); ?>
</div>