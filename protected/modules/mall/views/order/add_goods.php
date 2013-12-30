<link type="text/css" rel="stylesheet"
      href="<?php echo Yii::app()->theme->baseUrl; ?>/css/common.css"/>
<div class="goods-form">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'goods-grid',
        'dataProvider' => $goods->search(),
        'filter' => $goods,
        'columns' => array(
            array(
                'value' => 'Tbfunction::add_goods($date->item_id)'
            ),
            'item_id',
            array(
                'name' => 'category_id',
            ),
            'outer_id',
            'title',
            'stock',
            'min_number',
            'currency',
            'price',
            'desc',
            'create_time',
            'update_time',
        )
    ))
    ?>
</div>