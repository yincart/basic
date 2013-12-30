<div class="goods-form">
<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'user-grid',
    'dataProvider' => $order_item->search(),
    'filter' => $order_item,
    'columns' => array(
        'order_item_id',
        'order_id',
        'item_id',
        'title',
        'desc',
        'pic',
        'props_name',
        'price',
        'quantity',
        'total_price'
    )
))
?>