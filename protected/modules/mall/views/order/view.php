<?php
$this->breadcrumbs=array(
	'Orders'=>array('index'),
	$model->order_id,
);


?>

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
        array(
            'name' => 'detail_address',
            'value' => 'Order::showDetailAddress',
        ),
		'receiver_zip',
		'receiver_mobile',
		'receiver_phone',
		'memo',
        array(
            'name' => 'pay_time',
            'value' => date('Y-m-d H:i:s',$model->pay_time +(8 * 3600)),
        ),
        array(
            'name' => 'ship_time',
            'value' => date('Y-m-d H:i:s',$model->ship_time +(8 * 3600)),
        ),
        array(
            'name' => 'create_time',
            'value' => date('Y-m-d H:i:s',$model->create_time +(8 * 3600)),
        ),
        array(
            'name' => 'update_time',
            'value' => date('Y-m-d H:i:s',$model->update_time +(8 * 3600)),
        ),
	),
)); ?>
