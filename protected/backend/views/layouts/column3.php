<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div class="row">
    <div class="span2">
        <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array_merge(array(
        array('label'=>'主菜单'),
        array('label'=>'控制面板', 'icon'=>'home', 'url'=>array('/site/index')),
        '---',
        array('label'=>'商品'),
        array('label'=>'商品分类', 'icon'=>'bookmark', 'url'=>array('/category/admin')),
        array('label'=>'商品列表', 'icon'=>'leaf', 'url'=>array('/item/admin')),
        array('label'=>'品牌列表', 'icon'=>'book', 'url'=>array('/brand/admin')),
        '---',
        array('label'=>'支付'),
        array('label'=>'支付方式', 'icon'=>'bookmark', 'url'=>array('/paymentMethod/admin')),
        array('label'=>'配送方式', 'icon'=>'leaf', 'url'=>array('/shippingMethod/admin')),
        '---',
        array('label'=>'订单'),
        array('label'=>'订单列表', 'icon'=>'bookmark', 'url'=>array('/order/admin')),
        array('label'=>'资金列表', 'icon'=>'leaf', 'url'=>array('/payment/admin')),
        array('label'=>'订单日志', 'icon'=>'leaf', 'url'=>array('/orderLog/admin')),
        '---',
        array('label'=>'服务'),
        array('label'=>'发货单', 'icon'=>'bookmark', 'url'=>array('/shipping/admin')),
        array('label'=>'退货单', 'icon'=>'leaf', 'url'=>array('/refund/admin')),
        '---',
        array('label'=>'子目录'),
        ),$this->menu),
)); ?>
    </div>
    <div class="span10">
        <div id="content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
</div>
<?php $this->endContent(); ?>