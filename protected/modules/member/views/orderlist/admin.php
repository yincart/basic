<?php
$this->breadcrumbs = array(
    '我的订单' => array('admin'),
    '管理',
);
?>

<div class="box">
    <div class="box-title">管理订单</div>
    <div class="box-content">
        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'order-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'columns' => array(
                'order_id',
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
                'total_fee',
                'ship_fee',
                'pay_fee',
                /*
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
                    'class' => 'CButtonColumn',
                ),
            ),
        ));
        ?>
    </div>
</div>