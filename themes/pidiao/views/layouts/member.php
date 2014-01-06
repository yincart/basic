<?php

 $this->beginContent('//layouts/main'); ?>
<div class="big-box">
    <div class="big-box-left">
        <div class="box">
            <div class="box-title">Menu</div>
            <div class="box-content">
                <ul>
                    <li><?php echo CHtml::link('personal data', array('/user/profile/edit')) ?></li>
                    <li><?php echo CHtml::link('delivery address', array('/member/delivery_address/admin')) ?></li>
                    <li><?php echo CHtml::link('change password', array('/user/profile/changepassword')) ?></li>
                    <li><?php echo CHtml::link('我的订单', array('/member/orderlist/admin')) ?></li>

                    <li><?php echo CHtml::link('我的收藏', array('/member/wishlist/admin')) ?></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="big-box-right">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="clr"></div>

</div>

<div class="grid_21 omega">

    <div class="float">
        <div class="float_button">
            <a href="">联系<br/>在线客服</a>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
