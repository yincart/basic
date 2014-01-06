<tr>
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
        <td colspan="7" style="padding:10px">您的购物车是空的!</td>
    </tr>
<?php
} else {
    foreach ($items as $item) {
        ?>
        <tr><?php
            echo CHtml::hiddenField('item_id[]', $item->item_id);
            echo CHtml::hiddenField('props[]', empty($item->sku) ? '' : implode(';', json_decode($item->sku->props, true)));
            ?>
            <td><?php echo CHtml::image($item->getMainPic(), $item->title, array('width' => '80px', 'height' => '80px')); ?></td>
            <td><?php echo $item->title; ?></td>
            <td><?php echo empty($item->sku) ? '' : implode(';', json_decode($item->sku->props_name, true)); ?></td>
            <td><?php echo $item->getPrice(); ?></td>
            <td><?php echo CHtml::textField('qty[]', $item->getQuantity(), array('size' => '4', 'maxlength' => '5', 'data-url' => Yii::app()->createUrl('cart/update'))); ?></td>
            <td><?php echo $item->getSumPrice() ?>元</td>
            <td><?php echo CHtml::link('移除', array('/cart/remove', 'key' => $item->getId())) ?></td>
        </tr>
    <?php
    }
} ?>
<tr>
    <td colspan="7" style="padding:10px;text-align:right">总计：<?php echo $cart->getCost() ?> 元</td>
</tr>