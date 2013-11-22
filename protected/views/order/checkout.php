<?php
$this->breadcrumbs=array(
	'购物车'=>array('/cart'),
        '确认订单' 
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#confirmOrder").click(function (event) {
            $('#orderForm').submit(); 
        });
    });
    
</script>
<?php echo CHtml::beginForm(array('/order/create'), 'POST', array('id'=>'orderForm')) ?>
<div class="box">
    <div class="box-title"><span style="float:right"><?php echo CHtml::link('管理收货地址', array('/member/delivery_address/admin'))?></span>收货地址</div>
    <div class="box-content">
        <?php
        $cri = new CDbCriteria(array(
            'condition'=>'user_id = '.Yii::app()->user->id
        ));
        $AddressResult = AddressResult::model()->findAll($cri);
        if($AddressResult){
        foreach($AddressResult as $address){
        $default_address = $address->is_default == 1 ? 'default_address' : '';
        echo '<li class='.$default_address.'>'.CHtml::radioButton('delivery_address', $address->is_default == 1 ? TRUE : FALSE, array('value'=>$address->contact_id, 'id'=>'delivery_address'.$address->contact_id));
        echo CHtml::tag('span', array(
				'class' => 'buyer-address shop_selection'),
                $address->s->name.'&nbsp;'.$address->c->name.'&nbsp;'.$address->d->name.'&nbsp;'.$address->address.'&nbsp;('.$address->contact_name.'&nbsp;收)&nbsp;'.$address->mobile_phone);
        echo '</li>';
        
        }}else{?>
        <?php echo CHtml::link('添加收货地址', array('/member/delivery_address/create'))?>    
        <?php }?>
        
    </div>
</div>
<div class="box">
    <div class="box-title">支付方式</div>
    <div class="box-content">
        <?php
        $cri = new CDbCriteria(array(
            'condition'=>'enabled = 1'
        ));
        $paymentMethod = PaymentMethod::model()->findAll($cri);
        $list = CHtml::listData($paymentMethod, 'id', 'name');
        echo CHtml::radioButtonList('pay_method', '1', $list);
        ?>
    </div>
</div>
<div class="box">
    <div class="box-title">购物车</div>
    <div class="box-content cart">
        
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="text-align:center;vertical-align:middle">
            <tr>
                <th width="20%">图片</th>
                <th width="20%">编号</th>
                <th width="20%">名称</th>
                <th width="20%">数量</th>
                <th width="20%">小计</th>
            </tr>
            <?php
//            print_r($mycart);
            if($mycart){
                $i=1;
            foreach($mycart as $m){?>
            <tr>
                <td><?php echo CHtml::hiddenField('order['.$i.'][rowid]', $m['rowid']) ?><?php echo $m['pic_url'] ?></td>
                <td><?php echo CHtml::hiddenField('order['.$i.'][sn]', $m['sn']) ?><?php echo $m['sn'] ?></td>
                <td><?php echo CHtml::hiddenField('order['.$i.'][title]', $m['title']) ?><?php echo $m['title'] ?></td>
                <td><?php echo CHtml::hiddenField('order['.$i.'][qty]', $m['qty']) ?><?php echo $m['qty'] ?></td>
                <td><?php echo CHtml::hiddenField('order['.$i.'][subtotal]', $m['subtotal']) ?><?php echo $m['subtotal'] ?>元</td>
            </tr>
            <?php 
            $i++;
            }
            
            }else{
            ?>
             <tr>
                 <td colspan="5" style="padding:10px">您的购物车是空的!</td>
             </tr>
             <?php } ?>
             <tr>
                 <td colspan="5" style="padding:10px;text-align:right">总计：<?php echo CHtml::hiddenField('pay_fee', $total) ?><?php echo $total ?> 元</td>
             </tr>
        </table>
    </div>
    </div>
    <div class="row">
        <div class="memo" style="float:left"><h3>给卖家留言：</h3><?php echo CHtml::textArea('memo','选填，可以告诉卖家您对商品的特殊要求，如：颜色、尺码等', array('rows'=>'1', 'cols'=>'60'));?></div>
        <div class="express" style="float:right">
        运送方式：
        <?php
        $cri = new CDbCriteria(array(
            'condition'=>'enabled = 1'
        ));
        $shippingMethod = ShippingMethod::model()->findAll($cri);
        $list = CHtml::listData($shippingMethod, 'id', 'name');
        echo CHtml::dropDownList('ship_method', '', $list);
        ?></div>
        
    </div>
    <div class="clear"></div>
    <div class="order-confirm"><span style="float:right;padding:5px 10px;"><?php echo CHtml::link('确认订单', '#', array('id'=>'confirmOrder', 'class'=>'btn1'))?></span></div>
    

<?php echo CHtml::endForm() ?>