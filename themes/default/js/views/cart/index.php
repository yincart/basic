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
    <div class="box-title container_24">购物车</div>
    <div class="box-content cart container_24">
        <?php echo CHtml::beginForm(array('/order/checkout'), 'POST', array('id' => 'cartForm')) ?>
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="text-align:center;vertical-align:middle" id="cart-table">
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
            <?php管理订单
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
//                    var_dump($key);die;
                    ?>
                    <tr><?php
                        $itemUrl = Yii::app()->createUrl('item/view', array('id' => $item->item_id));
                        ?>
                        <td style="display:none;">
                            <?php echo CHtml::hiddenField('item_id[]', $item->item_id, array('id' => '','class' => 'item-id'));
                            echo CHtml::hiddenField('props[]', empty($item->sku) ? '' : implode(';', json_decode($item->sku->props, true)),  array('id' => '','class' => 'props'));?>
                        </td>
                        <td><?php echo CHtml::checkBox('position[]', false, array('value' => $key, 'data-url' => Yii::app()->createUrl('cart/getPrice'))); ?></td>
                        <td><a href="<?php echo $itemUrl; ?>"><?php echo CHtml::image($item->getMainPic(), $item->title, array('width' => '80px', 'height' => '80px')); ?></a></td>
                        <td><?php echo CHtml::link($item->title, $itemUrl); ?></td>
                        <td><?php echo empty($item->sku) ? '' : implode(';', json_decode($item->sku->props_name, true)); ?></td>
                        <td><div id="Singel-Price"><?php echo $item->getPrice(); ?></div></td>


                        <td><?php echo CHtml::textField('quantity[]', $item->getQuantity(), array('size' => '4', 'maxlength' => '5', 'data-url' => Yii::app()->createUrl('cart/update'))); ?><div id="stock-error"></div></td>


                        <td><div id="SumPrice"><?php echo $item->getSumPrice() ?></div>元</td>
                        <td><?php echo CHtml::link('移除', array('/cart/remove', 'key' => $item->getId())) ?></td>
                    </tr>
                <?php
                }
            } ?>
            <tr>
                <td colspan="8" style="padding:10px;text-align:right">总计：<label id="total_price">0</label>元</td>
            </tr>
            <tr>
                <td colspan="8" style="vertical-align:middle"><span
                        style="float:left;padding:5px 10px;"><?php echo CHtml::link('清空购物车', array('/cart/clear'), array('class' => 'btn1')) ?></span>
                    <span
                        style="float:right;padding:5px 10px;"><?php echo CHtml::link('继续购物', array('./'), array('class' => 'btn1')) ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span
                        style="float:right;padding:5px 10px;"><?php echo CHtml::link('更新购物车', array('/cart/index'), array('id' => 'updateCart', 'class' => 'btn1')) ?></span>
                </td>
            </tr>
            <tr>
                <td colspan="8"><span
                        style="float:right;padding:5px 10px;"><?php echo CHtml::link('结算','#', array('class' => 'btn','id'=>'account')) ?></span>
                </td>
            </tr>
        </table>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>
<script type="text/javascript">

    $(function(){
        $("#quantity").keyup(function() {
            var tmptxt = $(this).val();
            $(this).val(tmptxt.replace(/\D|/g, ''));
        }).bind("paste", function() {
                var tmptxt = $(this).val();
                $(this).val(tmptxt.replace(/\D|/g, ''));
            }).css("ime-mode", "disabled");
    });//输入验证，保证只有数字。
</script>