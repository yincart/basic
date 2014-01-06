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
            'name' => 'status',
            'value' => 'Order::showStatus',
        ),
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
            'name' => 'payment_method_id',
            'value' => 'Order::showPayMethod',
        ),
        array(
            'name' => 'shipping_method_id',
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
        array(
            'name' => 'pay_time',
            'value' => date('Y年m月d日 H:i:s',$model->pay_time +(8 * 3600)),
        ),
        array(
            'name' => 'ship_time',
            'value' => date('Y年m月d日 H:i:s',$model->ship_time +(8 * 3600)),
        ),
        array(
            'name' => 'create_time',
            'value' => date('Y年m月d日 H:i:s',$model->create_time +(8 * 3600)),
        ),
        array(
            'name' => 'update_time',
            'value' => date('Y年m月d日 H:i:s',$model->update_time +(8 * 3600)),
        ),
	),
    //对应的是订单查看里面的内容，每一条就是一个内容。
)); ?>
