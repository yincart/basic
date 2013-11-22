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
                'status',
                'pay_status',
                'ship_status',
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