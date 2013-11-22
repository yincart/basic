<?php
$this->breadcrumbs=array(
	$this->module->id,
);
?>

<div class="box">
    <div class="box-title">我的订单</div>
    <div class="box-content cart">
        <table width="100%" border="1" cellspacing="1" cellpadding="0" style="border:solid 1px #cccccc">
            <tr>
                <th width="20%">订单编号</th>
                <th width="20%">姓名</th>
                <th width="20%">Email</th>
                <th width="20%">收获地址</th>
                <th width="20%">操作</th>
            </tr>
            <?php foreach($myorders as $mo){?>
            <tr>
                <td><?php echo $mo->order_sn ?></td>
                <td><?php echo $mo->user_name ?></td>
                <td><?php echo $mo->email ?></td>
                <td><?php echo $mo->address ?></td>
                <td><?php echo CHtml::link('查看', array('/member/default/orderView', 'id'=>$mo->order_id))?></td>                
            </tr>
            <?php }?>
        </table>
    </div>
</div>