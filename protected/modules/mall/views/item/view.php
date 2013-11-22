<?php
$this->breadcrumbs=array(
	'商品列表'=>array('list'),
	$model->title,
);

$this->menu=array(
array('label'=>'创建商品','icon'=>'plus','url'=>array('create')),
array('label'=>'更新商品','icon'=>'pencil','url'=>array('update','id'=>$model->item_id)),
array('label'=>'删除商品','icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->item_id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'查看商品','icon'=>'cog','url'=>array('list')),
);
?>

<h1>查看商品 #<?php echo $model->item_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'item_id',
		'category_id',
		'type_id',
		'title',
		'sn',
		'unit',
		'stock',
		'min_number',
		'market_price',
		'shop_price',
		'currency',
		'skus',
		'props',
		'props_name',
		'item_imgs',
		'prop_imgs',
		'pic_url',
		'desc',
		'location',
		'post_fee',
		'express_fee',
		'ems_fee',
		'is_show',
		'is_promote',
		'is_new',
		'is_hot',
		'is_best',
		'is_discount',
		'click_count',
		'sort_order',
		'create_time',
		'update_time',
		'language',
),
)); ?>
