<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	'Manage',
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
    )); ?>
</div>
<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'order-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		'order_id',
        'user_id',
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
            'filter' => array('0' => '未退货', '1' => '已退货' ),
        ),
        array(
            'name' => 'payment_method_id',
            'value' => '$data->showPayMethod()',
            'filter' => array('0' => '未设置', '1' => '支付宝','2'=>'银行卡支付' ),
        ),
        'pay_fee',
        'ship_fee',
        'total_fee',
        array(
            'name' => 'shipping_method_id',
            'value' => '$data->showShipMethod()',
            'filter' => array('1' => '平邮', '2' => '快递','3'=>'EMS' ),
        ),
 array(
     'name' => 'create_time',
     'value' => 'date("Y年m月d日 H:i:s",$data->create_time +(8 * 3600))',
 ),

		/*
		'total_fee',
		'ship_fee',

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
