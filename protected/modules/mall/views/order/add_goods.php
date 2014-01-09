<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link type="text/css" rel="stylesheet"
          href="<?php echo Yii::app()->theme->baseUrl; ?>/css/common.css"/>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery.js"></script>
    <?php Yii::app()->bootstrap->register(); ?>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/common.js"></script>

</head>
<body>
<div id="goods-form">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'goods-grid',
        'dataProvider' => $goods->search(),
        'filter' => $goods,
        'columns' => array(
            array(
                'value' => 'Tbfunction::add_button()'
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
            array(
                'name'=>'create_time',
                'value'=>'date("Y-m-d H:i;s",$data->create_time+8*3600)'
            ),
            array(
                'name'=>'update_time',
                'value'=>'date("Y-m-d H:i;s",$data->update_time+8*3600)'
            ),

        )
    ))
    ?>
</div>
</body>