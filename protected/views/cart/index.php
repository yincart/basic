<?php
$this->breadcrumbs=array(
	'购物车',
);
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script type="text/javascript">
    $(document).ready(function() {
        $("#updateCart").click(function (event) {
            $('#cartForm').submit(); 
        });
    });
</script>
<div class="box">
    <div class="box-title">购物车</div>
    <div class="box-content cart">
        <?php echo CHtml::beginForm(array('/cart/update'), 'POST', array('id'=>'cartForm')) ?>
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="text-align:center;vertical-align:middle">
            <tr>
                <th width="16%">图片</th>
                <th width="16%">编号</th>
                <th width="16%">名称</th>
                <th width="16%">数量</th>
                <th width="16%">小计</th>
                <th width="16%">操作</th>
            </tr>
            <?php
//            print_r($mycart);
            if($mycart){
                $i=1;
            foreach($mycart as $m){?>
            <tr>
                <td><?php echo CHtml::hiddenField($i.'[rowid]', $m['rowid']) ?><?php echo $m['pic_url'] ?></td>
                <td><?php echo $m['sn'] ?></td>
                <td><?php echo $m['title'] ?></td>
                <td><?php echo CHtml::textField($i.'[qty]', $m['qty'], array('size' => '4', 'maxlength' => '5')) ?></td>
                <td><?php echo $m['subtotal'] ?>元</td>
                <td><?php echo CHtml::link('移除', array('/cart/delete', 'rowid'=>$m['rowid']))?></td>
            </tr>
            <?php 
            $i++;
            }
            
            }else{
            ?>
             <tr>
                 <td colspan="6" style="padding:10px">您的购物车是空的!</td>
             </tr>
             <?php } ?>
             <tr>
                 <td colspan="6" style="padding:10px;text-align:right">总计：<?php echo $total ?> 元</td>
             </tr>
            <tr>
                <td colspan="6" style="vertical-align:middle"><span style="float:left;padding:5px 10px;"><?php echo CHtml::link('清空购物车', array('/cart/destory'), array('class'=>'btn'))?></span>
        <span style="float:right;padding:5px 10px;"><?php echo CHtml::link('继续购物', array('/item-list-all'), array('class'=>'btn'))?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span style="float:right;padding:5px 10px;"><?php echo CHtml::link('更新购物车', '#', array('id'=>'updateCart', 'class'=>'btn'))?></span></td>
            </tr>
            <tr>
                 <td colspan="6"><span style="float:right;padding:5px 10px;"><?php echo CHtml::link('结算', array('/order/checkout'), array('class'=>'btn1'))?></span></td>
             </tr>
        </table>
         <?php echo CHtml::endForm(); ?>
    </div>
</div>