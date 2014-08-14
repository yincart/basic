<?php
$this->breadcrumbs = array(
    '我的订单' => array('admin'),
    '管理',
);
?>

<div class="box" style="width:1050px;">
    <div class="box-title">管理订单</div>
    <div class="box-content clearfix">
      <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'order-grid',
            'dataProvider' => $model->MyOrderSearch(),
            'filter' => $model,
            'columns' => array(
                'order_id',
                array(
                    'name' => 'status',
                    'value' => 'Tbfunction::showOrderStatus($data->status)',
                    'filter' => Tbfunction::ReturnOrderStatus(),
                ),
                'total_fee',
                'ship_fee',
                'pay_fee',
                array(
                    'name' => 'create_time',
                    'value' => 'date("Y-m-d H:i:s", $data->create_time)',
                ),
                array(
                    'name' => 'pay_status',
                    'value' => 'Tbfunction::showPayStatus($data->pay_status)',
                    'filter' => Tbfunction::ReturnPayStatus(),
                ),
                array(
                    'name' => 'ship_status',
                    'value' => 'Tbfunction::showShipStatus($data->ship_status)',
                    'filter' => Tbfunction::ReturnShipStatus(),
                ),
                array(
                    'name' => 'payment_method_id',
                    'value' => 'Tbfunction::showPayMethod($data->payment_method_id)',
                    'filter' => Tbfunction::ReturnPayMethod(),
                ),
                array(
                    'value' => 'Tbfunction::view_user($data->order_id)',
                ),
            ),
        ));
        ?>
    </div>
</div>
