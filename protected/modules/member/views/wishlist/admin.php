<?php

$this->breadcrumbs = array(
    '我的收藏' => array('admin'),
    '管理',
);
?>

<div class="box">
    <div class="box-title">我的收藏夹</div>
    <div class="box-content">
        <?php
        $url = Yii::app()->baseUrl . '/item/';
        $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'wishlist-grid',
            'dataProvider' => $model->MyCollectSearch(),

            'columns' => array(
                    array(
                        'class' => 'CImageColumn',
                        'header' => '图片',
                        'labelExpression' => '$data->item->title',
                        'urlExpression' => 'Yii::app()->createUrl("item",array("view"=>$data->item->item_id))',
                        'imageExpression' => '$data->item->getMainPic()',
                        'imageOptions' => array('style'=> 'width: 100px;' ),
                    ),
                array(
                    'class' => 'CLinkColumn',
                    'header' => '名称',
                    'labelExpression' => '$data->item->title',
                    'htmlOptions' => array('class' => 'col-xs-4'),
                ),
                array(
                    'name' => '价格',
                    'value' => '$data->item->price',
                    'htmlOptions' => array('class' => 'col-xs-2')
                ),
                array(
                    'name' => '库存',
                    'value' => '$data->item->stock',
                    'htmlOptions' => array('class' => 'col-xs-2')
                ),
                array(
                    'name' => '收藏时间',
                    'value' => 'date("Y-m-d", $data->create_time)',
                    'htmlOptions' => array('class' => 'col-xs-2')
                ),
                array(
                    'header' => '操作',
                    'class' => 'CButtonColumn',
                    'template' => '{view}{update}{delete}',
                    'viewButtonUrl' => 'Yii::app()->createUrl("/item/view",
                    array("id" => $data->item_id))',
                    'htmlOptions' => array('class' => 'col-xs-2')
                ),
            ),
        ));
        ?>
    </div>
</div>

