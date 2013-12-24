<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id,
);


?>
<!--就是前面的  /Orders/20130429310210-->

<h1>View Order #<?php echo $model->order_id; ?></h1>

<?php
$this->widget('bootstrap.widgets.TbDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'order_id',
        'user_id',
        array(
            'name' => 'ship_status',
            'value' => 'Order::showShipState',
        ),
        array(
            'name' => 'refund_status',
            'value' => 'Order::showRefundState',
        ),
        array(
            'name' => 'pay_status',
            'value' => 'Order::showPayState',
        ),
		'total_fee',
		'ship_fee',
		'pay_fee',
        array(
            'name' => 'pay_method',
            'value' => 'Order::showPayMethod',
        ),
        array(
            'name' => 'ship_method',
            'value' => 'Order::showShipMethod',
        ),
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
	),
    //对应的是订单查看里面的内容，每一条就是一个内容。
)); ?>
