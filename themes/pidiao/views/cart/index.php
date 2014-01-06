<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/cart/core.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/cart/box.css');
$this->breadcrumbs = array(
    '购物车',
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#updateCart").click(function (event) {
            $('#cartForm').submit();
        });
    });
</script>
<div class="box">
    <div class="box-title">购物车</div>
    <div class="box-content cart">
        <?php echo CHtml::beginForm(array('/order/checkout'), 'POST', array('id' => 'cartForm')) ?>
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="text-align:center;vertical-align:middle">
            <tr>
                <th width="2%"><?php echo CHtml::checkBox('checkAllPosition', false, array('data-url' => Yii::app()->createUrl('cart/getPrice'))); ?></th>
                <th width="14%">图片</th>
                <th width="14%">名称</th>
                <th width="14%">属性</th>
                <th width="14%">价格</th>
                <th width="14%">数量</th>
                <th width="14%">小计</th>
                <th width="14%">操作</th>
            </tr>
            <?php
            $cart = Yii::app()->cart;
            $items = $cart->getPositions();
            if (empty($items)) {
                ?>
                <tr>
                    <td colspan="8" style="padding:10px">您的购物车是空的!</td>
                </tr>
            <?php
            } else {
                foreach ($items as $key => $item) {
                    ?>
                    <tr><?php
                        echo CHtml::hiddenField('item_id[]', $item->item_id);
                        echo CHtml::hiddenField('props[]', empty($item->sku) ? '' : implode(';', json_decode($item->sku->props, true)));
                        ?>
                        <td><?php echo CHtml::checkBox('position[]', false, array('value' => $key)); ?></td>
                        <td><?php echo CHtml::image($item->getMainPic(), $item->title, array('width' => '80px', 'height' => '80px')); ?></td>
                        <td><?php echo $item->title; ?></td>
                        <td><?php echo empty($item->sku) ? '' : implode(';', json_decode($item->sku->props_name, true)); ?></td>
                        <td><?php echo $item->getPrice(); ?></td>
                        <td><?php echo CHtml::textField('quantity[]', $item->getQuantity(), array('size' => '4', 'maxlength' => '5', 'data-url' => Yii::app()->createUrl('cart/update'))); ?></td>
                        <td><?php echo $item->getSumPrice() ?>元</td>
                        <td><?php echo CHtml::link('移除', array('/cart/remove', 'key' => $item->getId())) ?></td>
                    </tr>
                <?php
                }
            } ?>
            <tr>
                <td colspan="8" style="padding:10px;text-align:right">总计：<?php echo $cart->getCost() ?> 元</td>
            </tr>
            <tr>
                <td colspan="8" style="vertical-align:middle"><span
                        style="float:left;padding:5px 10px;"><?php echo CHtml::link('清空购物车', array('/cart/clear'), array('class' => 'btn')) ?></span>
                    <span
                        style="float:right;padding:5px 10px;"><?php echo CHtml::link('继续购物', array('/'), array('class' => 'btn')) ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span
                        style="float:right;padding:5px 10px;"><?php echo CHtml::link('更新购物车', array('/cart/index'), array('id' => 'updateCart', 'class' => 'btn')) ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="8"><span
                        style="float:right;padding:5px 10px;"><?php echo CHtml::submitButton('结算', array('class' => 'btn1')) ?></span>
                </td>
            </tr>
        </table>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>
<script type="text/javascript">
    $('[name="quantity[]"]').change(function () {
        var item_id = $(this).parents('tr').find('[name="item_id[]"]').val();
        var props = $(this).parents('tr').find('[name="props[]"]').val();
        var qty = $(this).val();
        var data = {'item_id': item_id, 'props': props, 'qty': qty};
        $.post($(this).data('url'), data, function (response) {
            window.location.reload();
        }, 'json');
    });
    $('#checkAllPosition').click(function() {
        if ($(this).attr('checked')) {
            $('[name="position[]"]').attr('checked', 'checked');
        } else {
            $('[name="position[]"]').removeAttr('checked');
        }
    });
    $('#cartForm').on('click', '[name="position[]"]', function() {
        console.log($(this));
    });
</script>