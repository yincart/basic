<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/cart/core.css');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/cart/box.css');
$this->breadcrumbs = array(
    '购物车' => array('/cart'),
    '确认订单'
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script>
    $(function(){
        var flag = 0;
        $("#confirmOrder").click(function () {
            if ($(this).hasClass('btn1')) {
                $("#orderForm").submit();
            }
        });
        $('.delivery-address').change(function(){
             if($(this).val()){
                 if($('[name="payment_method_id"]').prop('checked')){
                     $('#confirmOrder').removeClass("btn");
                     $('#confirmOrder').addClass("btn1");
                 }
             }else{
                 $('#confirmOrder').removeClass("btn1");
                 $('#confirmOrder').addClass("btn");
             }
        })
        $('[name="payment_method_id"]').change(function(){
            if($(this).val()){
                if($('.delivery-address').prop('checked')){
                    $('#confirmOrder').removeClass("btn");
                    $('#confirmOrder').addClass("btn1");
                }
            }else{
                $('#confirmOrder').removeClass("btn1");
                $('#confirmOrder').addClass("btn");
            }
        })
    });

</script>
    <div style="margin-top:10px"></div>
<?php echo CHtml::beginForm(array('/order/create'), 'POST', array('id' => 'orderForm')) ?>
<?php if (Yii::app()->user->id) { ?>
    <div class="box address-panel">
        <div class="box-title container_24"><span
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
                    echo '<li class=' . $default_address . '>' . CHtml::radioButton('delivery_address', $address->is_default == 1 ? TRUE : FALSE, array('value' => $address->contact_id, 'class' => 'delivery-address', 'id' => 'delivery_address' . $address->contact_id));
                    echo CHtml::tag('span', array(
                            'class' => 'buyer-address shop_selection'),
                        $address->s->name . '&nbsp;' . $address->c->name . '&nbsp;' . $address->d->name . '&nbsp;' . $address->address . '&nbsp;(' . $address->contact_name . '&nbsp;收)&nbsp;' . $address->mobile_phone);
                    echo '</li>';
                }
            }
            ?>
        </div>
    </div>

<?php } else { ?>
    <div class="box">
        <div class="box-title">delivery address</div>
        <div class="box-content">
            <?php $model = new AddressResult;
            ?>

            <p class="note">Fields with <span class="required">*</span> are required.</p>

            <div class="row">
                <label for="AddressResult_contact_name" class="required">联系人<span class="required">*</span></label>
                <input size="45" maxlength="45" name="AddressResult[contact_name]" id="AddressResult_contact_name"
                       type="text"/>
            </div>
            <div class="row">
                <?php
                $state_data = Area::model()->findAll("grade=:grade",
                    array(":grade" => 1));
                $state = CHtml::listData($state_data, "area_id", "name");
                $s_default = $model->isNewRecord ? '' : $model->state;
                echo '省&nbsp;' . CHtml::dropDownList('AddressResult[state]', $s_default, $state,
                        array(
                            'empty' => '请选择省份',
                            'ajax' => array(
                                'type' => 'GET', //request type
                                'url' => CController::createUrl('dynamiccities'), //url to call
                                'update' => '#AddressResult_city', //selector to update
                                'data' => 'js:"AddressResult_state="+jQuery(this).val()',
                            )));
                //empty since it will be filled by the other dropdown
                $c_default = $model->isNewRecord ? '' : $model->city;
                if (!$model->isNewRecord) {
                    $city_data = Area::model()->findAll("parent_id=:parent_id",
                        array(":parent_id" => $model->state));
                    $city = CHtml::listData($city_data, "id", "name");
                }
                $city_update = $model->isNewRecord ? array() : $city;
                echo '&nbsp;市&nbsp;' . CHtml::dropDownList('AddressResult[city]', $c_default, $city_update,
                        array(
                            'empty' => '请选择城市',
                            'ajax' => array(
                                'type' => 'GET', //request type
                                'url' => CController::createUrl('dynamicdistrict'), //url to call
                                'update' => '#AddressResult_district', //selector to update
                                'data' => 'js:"AddressResult_city="+jQuery(this).val()',
                            )));
                $d_default = $model->isNewRecord ? '' : $model->district;
                if (!$model->isNewRecord) {
                    $district_data = Area::model()->findAll("parent_id=:parent_id",
                        array(":parent_id" => $model->city));
                    $district = CHtml::listData($district_data, "id", "name");
                }
                $district_update = $model->isNewRecord ? array() : $district;
                echo '&nbsp;区&nbsp;' . CHtml::dropDownList('AddressResult[district]', $d_default, $district_update,
                        array(
                            'empty' => '请选择地区',
                        )
                    );
                ?>
            </div>
            <div class="row">
                <label for="AddressResult_zipcode" class="required">邮政编号 <span class="required">*</span></label> <input
                    size="10" maxlength="45" name="AddressResult[zipcode]" id="AddressResult_zipcode" type="text"/>
            </div>
            <div class="row">
                <label for="AddressResult_address" class="required">详细地址 <span class="required">*</span></label> <input
                    size="60" maxlength="255" name="AddressResult[address]" id="AddressResult_address" type="text"/>
            </div>
            <div class="row">
                <label for="AddressResult_mobile_phone" class="required">手机 <span class="required">*</span></label>
                <input size="45" maxlength="45" name="AddressResult[mobile_phone]" id="AddressResult_mobile_phone"
                       type="text"/></div>
            <div class="row">
                <label for="AddressResult_phone">电话</label> <input size="45" maxlength="45" name="AddressResult[phone]"
                                                                   id="AddressResult_phone" type="text"/></div>
            <div class="row">
                <label for="AddressResult_memo">备注</label> <textarea rows="6" cols="50" name="AddressResult[memo]"
                                                                     id="AddressResult_memo"></textarea></div>


        </div>
    </div>

<?php } ?>
    <div class="box">
        <div class="box-title container_24">支付方式</div>
        <div class="box-content">
            <?php
            $cri = new CDbCriteria(array(
                'condition' => 'enabled = 1'
            ));
            $paymentMethod = PaymentMethod::model()->findAll($cri);
            $list = CHtml::listData($paymentMethod, 'payment_method_id', 'name');
            echo CHtml::radioButtonList('payment_method_id', '0', $list);
            ?>
        </div>
    </div>


    <div class="box">
        <div class="box-title container_24">商品列表</div>
        <div class="box-content cart container_24">
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
                if (isset($item)) {
                    $item->getId();
                    ?>
                    <tr><?php
                        ?>
                        <td><?php echo CHtml::image($item->getMainPic(), $item->title, array('width' => '80px', 'height' => '80px')); ?></td>
                        <td><?php echo $item->title; ?></td>
                        <td><?php echo  empty($item->sku) ? '' : implode(';', json_decode($item->sku->props_name, true)); ?></td>
                        <td><?php echo $item->getPrice(); ?></td>
                        <td><?php echo $item->getQuantity(); ?></td>
                        <td><?php echo $item->getSumPrice() ?>元</td>
                        <?php $price += $item->getSumPrice() ?>
                    </tr>
                <?php
                } else {
                    $cart = Yii::app()->cart;
                    $items = $cart->getPositions();
                    if (empty($items)) {
                        ?>
                        <tr>
                            <td colspan="6" style="padding:10px">您的购物车是空的!</td>
                        </tr>
                    <?php
                    } else {
                        $price = 0;
                        foreach ($keys as $key) {
                            if (!isset($items[$key])) continue;
                            $item = $items[$key];
                            echo CHtml::hiddenField('keys[]', $key);
                            ?>
                            <tr><?php
                                ?>
                                <td><?php echo CHtml::image($item->getMainPic(), $item->title, array('width' => '80px', 'height' => '80px')); ?></td>
                                <td><?php echo $item->title; ?></td>
                                <td><?php echo empty($item->sku) ? '' : implode(';', json_decode($item->sku->props_name, true)); ?></td>
                                <td><?php echo $item->getPrice(); ?></td>
                                <td><?php echo $item->getQuantity(); ?></td>
                                <td><?php echo $item->getSumPrice() ?>元</td>
                                <?php $price += $item->getSumPrice() ?>
                            </tr>
                        <?php
                        }
                    }
                }?>
                <tr>
                    <td colspan="6" style="padding:10px;text-align:right">总计：<?php echo $price; ?> 元</td>
                </tr>
            </table>
        </div>
        <div class="box-content">
            <div class="memo" style="float:left"><h3>
                    给卖家留言：</h3><?php echo CHtml::textArea('memo', '', array('rows' => '1', 'cols' => '60', 'placeholder' => '选填，可以告诉卖家您对商品的特殊要求，如：颜色、尺码等')); ?>
            </div>
        </div>
    </div>

    <div class="order-confirm" style="margin: 0 auto;width: 1180px">
        <span
            style="float: right"><?php echo CHtml::link('确认订单', '#', array('id' => 'confirmOrder', 'class' => 'btn')) ?></span>

    </div>
    <div style="clear: both;margin-bottom: 10px"></div>
<?php echo CHtml::endForm() ?>