<?php

$this->breadcrumbs = array(
    '我的收藏' => array('admin'),
    '管理',
);
?>

<div class="box">
    <div class="box-title">我的收藏</div>
    <div class="box-content">
        <?php

$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'wishlist-grid',
    'dataProvider' => $model->search(),
//    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'item.title',
            'value' => '$data->item->title',
        ),
        array(
            'name' => 'item.sn',
            'value' => '$data->item->sn',
        ),
        array(
            'name' => 'item.shop_price',
            'value' => '$data->item->shop_price',
        ),
        array(
            'name' => 'create_time',
            'value' => 'date("Y-m-d", $data->create_time)',
            'htmlOptions' => array('style'=>'width:100px')
        ),
        array(
            'class' => 'CButtonColumn',
            'template' => '{view}{update}{delete}',
            'viewButtonUrl' => 'Yii::app()->createUrl("/item/view",
array("id" => $data->item_id))',
        ),
    ),
));
?>
    </div>
</div>

