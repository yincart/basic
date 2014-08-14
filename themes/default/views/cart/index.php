<?php
$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/deal.css');
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
<?php $imageHelper=new ImageHelper(); ?>
<div class="box">
    <div class="box-title container_24">我的购物车</div>
    <div class="box-content cart container_24">
        <?php echo CHtml::beginForm(array('/order/checkout'), 'POST', array('id' => 'cartForm')) ?>
        <table class="table" id="cart-table">
           <thead>
            <tr>
                <th class=""><?php echo CHtml::checkBox('checkAllPosition', true, array('data-url' => Yii::app()->createUrl('cart/getPrice'))); ?></th>
                <th class="col-md-2">图片</th>
                <th class="col-md-3">名称</th>
                <th class="col-md-3">属性</th>
                <th class="col-md-1">价格</th>
                <th class="col-md-1">数量</th>
                <th class="col-md-1">小计</th>
                <th class="col-md-1">操作</th>
            </tr>
            </thead>
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
                $total = 0;
                foreach ($items as $key => $item) {
//                    var_dump($key);die;
                    ?>
                    <tbody id="<?php echo $item->getId();?>"><tr><?php
                        $itemUrl = Yii::app()->createUrl('item/view', array('id' => $item->item_id));
                        ?>
                        <td style="display:none;">
                            <?php echo CHtml::hiddenField('item_id[]', $item->item_id, array('id' => '','class' => 'item-id'));
                            echo CHtml::hiddenField('props[]', empty($item->sku) ? '' : implode(';', json_decode($item->sku->props, true)),  array('id' => '','class' => 'props'));?>
                        </td>
                        <td><?php echo CHtml::checkBox('position[]', true, array('value' => $key, 'data-url' => Yii::app()->createUrl('cart/getPrice'))); ?></td>
                        <?php
                            $picUrl=$imageHelper->thumb('70','70',$item->getMainPic());
                            $picUrl=yii::app()->baseUrl. $picUrl;
                        ?>
                        <td><a href="<?php echo $itemUrl; ?>"><?php echo CHtml::image($picUrl, $item->title, array('width' => '80px', 'height' => '80px')); ?></a></td>
                        <td><?php echo CHtml::link($item->title, $itemUrl); ?></td>
                        <td><?php echo empty($item->sku) ? '' : implode(';', json_decode($item->sku->props_name, true)); ?></td>
                        <td><divcatalog id="Singel-Price"><?php echo $item->getPrice(); ?></div></td>


                        <td>
                            <span class="glyphicon glyphicon-minus-sign btn-reduce"></span><?php echo CHtml::textField('quantity[]', $item->getQuantity(), array('size' => '4', 'class'=>'quantity','maxlength' => '5', 'data-url' => Yii::app()->createUrl('cart/update'))); ?>
                            <input id="pre_quantity" class="pre_quantity" type="hidden" value="<?php echo $item->getQuantity();?>" />
                            <span class="glyphicon glyphicon-plus-sign btn-add"></span>
                            <div id="stock-error"></div><input id="pre_quantity" type="hidden"  />
                        </td>


                        <td><div id="SumPrice"><?php echo $item->getSumPrice(); ?></div>元</td>
                        <td><?php echo CHtml::link('移除', array('/cart/remove', 'key' => $item->getId())) ?></td>
                    </tr></tbody>
                    <?php $i++; $total += $item->getSumPrice();?>
                <?php
                }
            } ?>
            <tfoot>
            <tr>
                <td colspan="8" style="padding:10px;text-align:right">总计：<label id="total_price"><?php echo $total;?></label>元</td>
            </tr>
            <tr>
                <td colspan="8" style="vertical-align:middle">
                    <input class="btn btn-danger pull-left" type="button" value="清空购物车" onclick="window.location.href='<?php echo Yii::app()->createUrl('cart/clear');?>'"/>
<!--                    <button class="btn btn-danger pull-left">--><?php //echo CHtml::link('清空购物车', array('/cart/clear'), array('class' => 'btn1')) ?><!--</button>-->

             <button class="btn btn-success" style="float:right;padding:1px 10px;" id="checkout"><?php echo CHtml::link('结算','#', array('class' => 'btn1','id'=>'account')) ?></button>
                    <input class="btn btn-primary" style="float:right;padding:1px 10px;margin-right: 10px;"  id="btn-primary" type="button"
                           value="继续购物" onclick="javascript:history.back(-1);"/>
<!--                    <button class="btn btn-primary"-->
<!--                            style="float:right;padding:1px 10px;margin-right: 10px;"  id="btn-primary">--><?php //echo CHtml::link('继续购物', array('./'), array('class' => 'btn1')) ?><!--</button>-->
                </td>
            </tr>
            </tfoot>
        </table>
        <?php echo CHtml::endForm(); ?>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      $(".btn-add").on('click',function(){
          $(this).siblings(".quantity").val(Number( $(this).siblings(".quantity").val())+1);
          if(!$(this).siblings("#stock-error").text()) {
            $(this).siblings(".pre_quantity").val(Number( $(this).siblings(".pre_quantity").val())+1);
          }
          update($(this).siblings(".quantity"));
      });
      $(".btn-reduce").on('click',function(){
          var change_quantity = Number( $(this).siblings(".quantity").val());
          $(this).siblings("#stock-error").find("#num-error").remove();
          if(change_quantity <= 1){
              $(this).siblings(".quantity").val(1);
              $(this).siblings(".pre_quantity").val(1);
              $(this).siblings("#stock-error").find("#error-message").remove();
              $(this).siblings("#stock-error").append("<div id=\"num-error\" style=\"color:red\">商品数量不能小于1</div>");
          }else{
              $(this).siblings(".pre_quantity").val(change_quantity-1);
              $(this).siblings(".quantity").val(change_quantity-1);
              update($(this).siblings(".quantity"));
          }
      });
  });

    $(function(){
        $('[name="position[]"]').change(function() {
            if($('[name="position[]"]:checked').length == 0) {
                $("#checkout").attr('disabled',true);
            } else {
                $("#checkout").removeAttr('disabled');
            }
        });
        $("#checkAllPosition").change(function() {
            if(!$("#checkAllPosition").attr('checked')) {
                $("#checkout").attr('disabled',true);
            } else {
                $("#checkout").removeAttr('disabled');
            }
        });
        $(".quantity").keyup(function() {
            var tmptxt = $(this).val();
            $(this).val(tmptxt.replace(/\D|^0/g, ''));
        }).bind("paste", function() {
                var tmptxt = $(this).val();
                $(this).val(tmptxt.replace(/\D|^0/g, ''));
            }).css("ime-mode", "disabled");
    });//输入验证，保证只有数字。

    function update(quantity) {
        var tr = quantity.closest('tr');
        var sku_id = tr.find("#position");
        var qty = quantity;
        var item_id = tr.find(".item-id");
        var props = tr.find(".props");
        var cart=parseInt($(".shopping_car").find("span").html());
        var sumPrice= parseFloat(tr.find("#SumPrice").html());
        var singlePrice=parseFloat( tr.find("#Singel-Price").html());
        var data = {'item_id': item_id.val(), 'props': props.val(), 'qty': qty.val(),'sku_id':sku_id.val()};
        $.post('/cart/update', data, function (response) {
            tr.find("#error-message").remove();
            tr.find("#num-error").remove();
            if (!response) {
                $(".shopping_car").find("span").html(cart-sumPrice/singlePrice+parseInt(qty.val()));
                tr.find("#SumPrice").html(parseFloat(qty.val()) * parseFloat(singlePrice));
                update_total_price();
            }
            tr.find("#stock-error").append(response);
            if(quantity.siblings('#stock-error').find("#error-message").text()) {
                quantity.val(Number(quantity.val())-1);
            }
        });
    }
    function update_total_price() {
        var positions = [];
        $('[name="position[]"]:checked').each(function () {
            positions.push($(this).val());
        });
        $.post('/cart/getPrice', {'positions': positions}, function (data) {
            if (!data.msg) {
                $('#total_price').text(data.total);
            }
        }, 'json');
    }

</script>