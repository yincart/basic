<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Order', 'icon'=>'list', 'url'=>array('index')),
	array('label'=>'Create Order', 'icon'=>'plus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('order-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<!--是前面的东西的代码 表示路径的代码  /Orders/Manage-->

<h1>Manage Orders</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
<?php echo CHtml::link('<div class="btn btn-primary">Create Order</div>','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">

    <?php $this->renderPartial('select_user',array(
        'users'=>$users,
        'usersf'=>$usersf
    )); ?>
</div><!-- search-form -->
<!--上面一大段都是表示界面中的 Advanced Search 用于高级搜索 这里的_search是表示点击 Advanced Search 后会渲染到_search这个界面，然后_search里面的那么多div都是相对应的-->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'order_id',
        'user_id',
        array(
            'name' => 'status',
            'value' => '$data->showStatus()',
            'filter' => array('0' => '无效', '1' => '有效' ),
        ),
        array(
            'name' => 'pay_status',
            'value' => '$data->showPayState()',
            'filter' => array('0' => '待支付', '1' => '已支付' ),
        ),
        array(
            'name' => 'ship_status',
            'value' => '$data->showShipState()',
            'filter' => array('0' => '未发货', '1' => '已发货' ),
        ),
        array(
            'name' => 'refund_status',
            'value' => '$data->showRefundState()',
            'filter' => array('0' => '未退款', '1' => '已退款' ),
        ),
        'pay_fee',
        'ship_fee',
        'total_fee',
        array(
            'name' => 'create_time',
            'value' => 'date("Y-m-d H:i:s",$data->create_time +(8 * 3600))',
        ),

		/*
		'total_fee',
		'ship_fee',
		,
		'pay_method',
		'ship_method',
		'receiver_name',
		'receiver_country',
		'receiver_state',
		'receiver_city',
		'receiver_district',
		'receiver_address',
		'receiver_zip',
		'receiver_mobile',
		'receiver_phone',
		'memo',
		'pay_time',
		'ship_time',
		'create_time',
		'update_time',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
        //是后面那三个标志。
	),
));
?>
