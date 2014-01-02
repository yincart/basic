<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <link type="text/css" rel="stylesheet"
          href="<?php echo Yii::app()->theme->baseUrl; ?>/css/common.css"/>
    <?php Yii::app()->bootstrap->register(); ?>

</head>
<body>
<div class="goods-form">
    <?php $this->widget('bootstrap.widgets.TbGridView', array(
        'id' => 'goods-grid',
        'dataProvider' => $goods->search(),
        'filter' => $goods,
        'columns' => array(
            array(
                'value' => 'Tbfunction::add_goods($data->item_id)'
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
</html>

<script type="text/javascript">
    $(document).ready(function () {
        $('#goods-grid').on('click','button',function(){
                alert(  $(this).data('items'));
            });
    });
</script>