<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/cart/core.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/cart/box.css');
$this->breadcrumbs = array(
    '购物车' => array('/cart'),
    '确认订单'
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#confirmOrder").click(function (event) {
                $('#orderForm').submit();
            });
        });

    </script>
    <div style="margin-top:10px"></div>
<?php echo CHtml::beginForm(array('/order/create'), 'POST', array('id' => 'orderForm')) ?>
    <div class="box">
        <div class="box-title"><span
                style="float:right"><?php echo CHtml::link('管理收货地址', array('/member/delivery_address/admin')) ?></span>收货地址
        </div>
        <div class="box-content">
            <?php
            $cri = new CDbCriteria(array(
                'condition' => 'user_id = ' . Yii::app()->user->id
            ));
            $AddressResult = AddressResult::model()->findAll($cri);
            if ($AddressResult) {
                foreach ($AddressResult as $address) {
                    $default_address = $address->is_default == 1 ? 'default_address' : '';
                    echo '<li class=' . $default_address . '>' . CHtml::radioButton('delivery_address', $address->is_default == 1 ? TRUE : FALSE, array('value' => $address->contact_id, 'id' => 'delivery_address' . $address->contact_id));
                    echo CHtml::tag('span', array(
                            'class' => 'buyer-address shop_selection'),
                        $address->s->name . '&nbsp;' . $address->c->name . '&nbsp;' . $address->d->name . '&nbsp;' . $address->address . '&nbsp;(' . $address->contact_name . '&nbsp;收)&nbsp;' . $address->mobile_phone);
                    echo '</li>';

                }
            } else {
                ?>
                <?php echo CHtml::link('添加收货地址', array('/member/delivery_address/create')) ?>
            <?php } ?>

        </div>
    </div>
    <div class="box">
        <div class="box-title">支付方式</div>
        <div class="box-content">
            <?php
            $cri = new CDbCriteria(array(
                'condition' => 'enabled = 1'
            ));
            $paymentMethod = PaymentMethod::model()->findAll($cri);
            $list = CHtml::listData($paymentMethod, 'payment_method_id', 'name');
            echo CHtml::radioButtonList('payment_method_id', '1', $list);
            ?>
        </div>
    </div>
    <div class="box">
        <div class="box-title">商品列表</div>
        <div class="box-content cart">
            <table width="100%" border="1" cellspacing="1" cellpadding="0"
                   style="text-align:center;vertical-align:middle">
                <tr>
                    <th width="15%">图片</th>
                    <th width="15%">名称</th>
                    <th width="15%">属性</th>
                    <th width="15%">价格</th>
                    <th width="15%">数量</th>
                    <th width="15%">小计</th>
                </tr>
                <?php
                $cart = Yii::app()->cart;
                $items = $cart->getPositions();
                if (empty($items)) {
                    ?>
                    <tr>
                        <td colspan="6" style="padding:10px">您的购物车是空的!</td>
                    </tr>
                <?php
                } else {
                    foreach ($keys as $key) {
                        if (!isset($items[$key])) continue;
                        $item = $items[$key];
                        echo CHtml::hiddenField('keys[]',$key);
                        ?>
                        <tr><?php
                            ?>
                            <td><?php echo CHtml::image($item->getMainPic(), $item->title, array('width' => '80px', 'height' => '80px')); ?></td>
                            <td><?php echo $item->title; ?></td>
                            <td><?php echo empty($item->sku) ? '' : implode(';', json_decode($item->sku->props_name, true)); ?></td>
                            <td><?php echo $item->getPrice(); ?></td>
                            <td><?php echo $item->getQuantity(); ?></td>
                            <td><?php echo $item->getSumPrice() ?>元</td>
                        </tr>
                    <?php
                    }
                } ?>
                <tr>
                    <td colspan="6" style="padding:10px;text-align:right">总计：<?php echo $cart->getCost(); ?> 元</td>
                </tr>
            </table>
        </div>
        <div class="box-content">
            <div class="memo" style="float:left"><h3>
                    给卖家留言：</h3><?php echo CHtml::textArea('memo', '', array('rows' => '1', 'cols' => '60', 'placeholder' => '选填，可以告诉卖家您对商品的特殊要求，如：颜色、尺码等')); ?>
            </div>
        </div>
    </div>

    <div class="order-confirm" style="margin: 0 auto;width: 1180px"><span
            style="float: right"><?php echo CHtml::link('确认订单', '#', array('id' => 'confirmOrder', 'class' => 'btn1')) ?></span>
    </div>
    <div style="clear: both;margin-bottom: 10px"></div>
<?php echo CHtml::endForm() ?>