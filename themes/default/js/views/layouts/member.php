<?php

 $this->beginContent('//layouts/main'); ?>
<div class="big-box container_24">
    <div class="big-box-left grid_4">
        <div class="box">
            <div class="box-title">My account</div>
            <div class="box-content">
                <ul>
                    <li><?php echo CHtml::link('personal data', array('/user/profile/edit')) ?></li>
                    <li><?php echo CHtml::link('delivery address', array('/member/delivery_address/admin')) ?></li>
                    <li><?php echo CHtml::link('change password', array('/user/profile/changepassword')) ?></li>
                </ul>
            </div>
            <div class="box-title">My deal</div>
            <div class="box-content">
                <ul>
                    <li><?php echo CHtml::link('my order', array('/member/orderlist/admin')) ?></li>
                    <li><?php echo CHtml::link('my collect', array('/member/wishlist/admin')) ?></li>
                    <li><?php echo CHtml::link('cart', array('//cart')) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="big-box-right grid_20">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
    <div class="clr"></div>

</div>

<div class="grid_21 omega">

    <div class="float">
        <div class="float_button">
            <a href="/basic/page/contact?key=help">联系<br/>在线客服</a>
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
