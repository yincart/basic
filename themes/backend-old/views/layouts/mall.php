<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

    <div id="sidebar-nav">
        <?php
        $this->widget('bootstrap.widgets.TbNav', array(
            'type' => TbHtml::NAV_TYPE_LIST,
            'items' => array_merge(array(
                array('label' => '主菜单'),
//                array('label' => '控制面板', 'icon' => 'home', 'url' => array('/site/index')),
                array('label' => '商品'),
                array('label' => '商品分类', 'icon' => 'bookmark', 'url' => array('/mall/itemCategory/admin')),
                array('label' => '商品属性', 'icon' => 'list-alt', 'url' => array('/mall/itemProp/admin')),
                array('label' => '商品列表', 'icon' => 'list-alt', 'url' => array('/mall/item/admin')),
                array('label' => '图片空间', 'icon' => 'list-alt', 'url' => array('/core/elfinder/admin')),
                array('label' => '支付'),
                array('label' => '支付方式', 'icon' => 'magnet', 'url' => array('/mall/paymentMethod/admin')),
                array('label' => '配送方式', 'icon' => 'plane', 'url' => array('/mall/shippingMethod/admin')),
                array('label' => '订单'),
                array('label' => '订单列表', 'icon' => 'shopping-cart', 'url' => array('/mall/order/admin')),
                array('label' => '资金列表', 'icon' => 'align-justify', 'url' => array('/mall/payment/admin')),
                array('label' => '订单日志', 'icon' => 'film', 'url' => array('/mall/orderLog/admin')),
                array('label' => '服务'),
                array('label' => '发货单', 'icon' => 'list-alt', 'url' => array('/mall/shipping/admin')),
                array('label' => '退货单', 'icon' => 'list-alt', 'url' => array('/mall/refund/admin')),
                array('label' => '子目录'),
            ), $this->menu),
        ));
        ?>
    </div>
    <div id="sidebar-content">
        <div class="row-fluid">
            <div class="span12">
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                        'links' => $this->breadcrumbs,
                    ));
                ?><!-- breadcrumbs -->
                <?php endif ?>
                <?php echo $content; ?>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>