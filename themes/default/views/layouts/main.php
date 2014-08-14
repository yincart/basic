<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo Yii::app()->params[t];
        echo Yii::app()->params[title1];
        echo Yii::app()->params[title]; ?></title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="keywords" content="<?php echo Yii::app()->params[h];
    echo Yii::app()->params['keywords']; ?>">
    <meta name="description" content="<?php echo Yii::app()->params[d];
    echo Yii::app()->params['description'];
     ?>">
    <meta http-equiv="content-language" content="zh"/>
    <meta http-equiv="Cache-Control" content="max-age=7200"/>
    <meta content="chrome=1" http-equiv="X-UA-Compatible"/>
    <link type='text/css' rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css'/>
    <link type='text/css' rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/common.css'/>
    <link type='text/css' rel='stylesheet' href='<?php echo Yii::app()->baseUrl; ?>/css/common.css'/>
    <link type='text/css' rel='stylesheet' href='<?php echo Yii::app()->baseUrl; ?>/css/form.css'/>
    <link type='text/css' rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/product.css'/>
    <link type='text/css' rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/member.css'/>
    <link type='text/css' rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/post.css'/>
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/common.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/common.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/passwordCheck.js"></script>
    <script type="text/javascript" src="<?php echo F::baseUrl(); ?>/js/holder.js"></script>
</head>
<body>
<div class="top">
    <div class="container">
        <?php $this->widget('widgets.default.WTopNav'); ?>
    </div>
</div>
<div class="clear"></div>
<div class="head">
    <div class="logo">
        <a href="<?php echo Yii::app()->getBaseUrl(true); ?>">
            <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/logo.png') ?>
        </a></div>
    <?php echo CHtml::beginForm(Yii::app()->createUrl('catalog/index'), 'get', array('class' => 'search')); ?>
    <div class="search_box">
        <?php echo Chtml::textField('key', isset($_GET['key']) ? $_GET['key'] : ''); ?>
        <button></button>
    </div>
    <div class="search_hot">
        热门搜索：
        <?php foreach (array('皮雕', '软皮', '压花') as $v) {
            echo CHtml::link($v, Yii::app()->createUrl('catalog/index', array('key' => $v)));
        } ?>
    </div>
    <?php echo Chtml::endForm(); ?>
    <a href="<?php echo Yii::app()->createUrl('cart/index'); ?>">
        <div class="shopping_car">
            购物车有<span class="cor_red bold"><?php echo Yii::app()->cart->getItemsCount(); ?></span>件商品
        </div>
    </a>
</div>
<div class="nav">
    <?php $this->widget('widgets.leather.WMainMenu') ?>
</div>
<?php if (Yii::app()->params['ads']) {
    echo $this->renderPartial('picture', array('ads' => Yii::app()->params['ads']), true, true);
} ?>

<div class="clear"></div>
<div class="container">
    <?php echo $content; ?>
</div>

<div class="clear"></div>
<div class="footer">
    <div class="foot_c">
        <div class="foot_new">
            <ul>
                <li><span class="font14 bold">新手指南</span></li>
                <li><?php echo CHtml::link('顾客必读', array('/page/index', 'key' => 'notice')); ?></li>
                <li><?php echo CHtml::link('会员等级折扣', array('/page/index', 'key' => 'memberrank')); ?></li>
                <li><?php echo CHtml::link('订单的几种状态', array('/page/index', 'key' => 'orderstatus')); ?></li>
                <li><?php echo CHtml::link('积分奖励计划', array('/page/index', 'key' => 'scoreplan')); ?></li>
                <li><?php echo CHtml::link('商品退货保障', array('/page/index', 'key' => 'returngood')); ?></li>
            </ul>
        </div>
        <div class="foot_pay">
            <ul>
                <li><span class="font14 bold">购物指南</span></li>
                <li><?php echo CHtml::link('非会员购物通道', array('/page/index', 'key' => 'nonmember')); ?></li>
                <li><?php echo CHtml::link('售后服务', array('/page/index', 'key' => 'service')); ?></li>
                <li><?php echo CHtml::link('网站使用条款', array('/page/index', 'key' => 'terms')); ?></li>
                <li><?php echo CHtml::link('免责条款', array('/page/index', 'key' => 'disclaimer')); ?></li>
                <li><?php echo CHtml::link('简单的购物流程', array('/page/index', 'key' => 'process')); ?></li>
            </ul>
        </div>
        <div class="foot_set">
            <ul>
                <li><span class="font14 bold">支付/配送方式</span></li>
                <li><?php echo CHtml::link('支付方式', array('/page/index', 'key' => 'payment')); ?></li>
                <li><?php echo CHtml::link('配送方式', array('/page/index', 'key' => 'shipping')); ?></li>
                <li><?php echo CHtml::link('订单何时出库', array('/page/index', 'key' => 'orderinfo')); ?></li>
                <li><?php echo CHtml::link('网上支付小贴士', array('/page/index', 'key' => 'onlinepayment')); ?></li>
                <li><?php echo CHtml::link('关于送货和验货', array('/page/index', 'key' => 'shippinginfo')); ?></li>
            </ul>
        </div>
        <div class="foot_back">
            <ul>
                <li><span class="font14 bold">售后服务</span></li>
                <li><?php echo CHtml::link('售后政策', array('/page/index', 'key' => 'aftermarket')); ?></li>
                <li><?php echo CHtml::link('价格保护', array('/page/index', 'key' => 'priceprotection')); ?></li>
                <li><?php echo CHtml::link('退款说明', array('/page/index', 'key' => 'refund')); ?></li>
                <li><?php echo CHtml::link('返修/退换货', array('/page/index', 'key' => 'rework_returns')); ?></li>
                <li><?php echo CHtml::link('取消订单', array('/page/index', 'key' => 'cancelorder')); ?></li>
            </ul>
        </div>
        <div class="foot_help">
            <ul>
                <li><span class="font14 bold">帮助中心</span></li>
                <li><?php echo CHtml::link('帮助中心', array('/page/index', 'key' => 'helpcenter')); ?></li>
                <li><?php echo CHtml::link('在线客服', array('/page/index', 'key' => 'contact')); ?></li>
                <li><?php echo CHtml::link('品质保证', array('/page/index', 'key' => 'qualityAssurance')); ?></li>
                <li><?php echo CHtml::link('批发政策', array('/page/index', 'key' => 'wholesale')); ?></li>
                <li><?php echo CHtml::link('关于我们', array('/page/index', 'key' => 'about')); ?></li>
            </ul>
        </div>
        <div class="foot_call">
            <p class="font14 bold">咨询电话</p>

            <p class="font14 bold cor_r">13967414054</p>
        </div>
    </div>
    <div class="foot_u">
        <p class="foot_link">
            <?php echo CHtml::link('关于我们', array('/page/index', 'key' => 'about')); ?>|
            <?php echo CHtml::link('联系我们', array('/page/index', 'key' => 'contact')); ?>|
            <?php echo CHtml::link('人才招聘', array('/page/index', 'key' => '')); ?>|
            <?php echo CHtml::link('商家入驻', array('/page/index', 'key' => 'join')); ?>|
            <?php echo CHtml::link('广告服务', array('/page/index', 'key' => '')); ?>|
            <?php echo CHtml::link('手机商城', array('/page/index', 'key' => '')); ?>|
            <?php echo CHtml::link('友情链接', array('/page/index', 'key' => '')); ?>|
            <?php echo CHtml::link('销售联盟', array('/page/index', 'key' => 'partner')); ?>|
            <a href="/basic/index.php">皮雕社区</a>|
            <?php echo CHtml::link('资源交流', array('/page/index', 'key' => '')); ?>
        </p>

        <p>Copyright@2013 - 2015 <?php echo Yii::app()->name ?> All Rights Reserved. <a href="">站长统计</a></p>

        <p>Powered by <a href="http://yincart.com">Yincart</a></p>
    </div>
</div>
</body>
</html>
