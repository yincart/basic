<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<?php  Yii::app()->getClientScript()->registerCssFile(F::themeUrl().'/css/styles.css');?>
    </head>

    <body screen_capture_injected="true">

	<?php
	$this->widget('bootstrap.widgets.TbNavbar', array(
	    'type' => 'inverse', // null or 'inverse'
	    'brand' => '后台管理',
	    'brandUrl' => '#',
	    'collapse' => true, // requires bootstrap-responsive.css
	    'fluid' => true,
	    'items' => array(
		array(
		    'class' => 'bootstrap.widgets.TbMenu',
		    'items' => array(
			array('label' => '控制面板', 'url' => array('/site/index'), 'visible' => !Yii::app()->user->isGuest),
			array('label' => '内容管理', 'url' => '#', 'items' => array(
				array('label' => '内容分类', 'url' => array('/cms/contentCategory/admin')),
				array('label' => '单页管理', 'url' => array('/cms/page/admin')),
				array('label' => '文章管理', 'url' => array('/cms/article/admin')),
				array('label' => '留言管理', 'url' => array('/cms/feedback/admin')),
//                                array('label' => '评论管理', 'url' => array('/cms/comment/admin')),
				'---',
				array('label' => 'OTHER'),
				array('label' => '广告管理', 'url' => array('/cms/ad/admin')),
				array('label' => '友情链接', 'url' => array('/cms/friendLink/admin')),
				array('label' => '邮件订阅', 'url' => array('/cms/newsletterSubscriber/admin')),
				array('label' => '客服管理', 'url' => array('/cms/customerService/admin')),
			    ), 'visible' => !Yii::app()->user->isGuest),
			array('label' => '商城管理', 'url' => '#', 'items' => array(
				array('label' => 'ITEM'),
				array('label' => '商品分类', 'url' => array('/mall/itemCategory/admin')),
				array('label' => '商品属性', 'url' => array('/mall/itemProp/admin')),
				array('label' => '商品列表', 'url' => array('/mall/item/admin')),
				'---',
				array('label' => 'Payment'),
				array('label' => '支付方式', 'url' => array('/mall/paymentMethod/admin')),
				array('label' => '物流配送', 'url' => array('/mall/shippingMethod/admin')),
				'---',
				array('label' => 'Order'),
				array('label' => '订单列表', 'url' => array('/mall/order/admin')),
				array('label' => '资金列表', 'url' => array('/mall/payment/admin')),
				array('label' => '订单日志', 'url' => array('/mall/orderLog/admin')),
				'---',
				array('label' => 'Service'),
				array('label' => '发货单', 'url' => array('/mall/shipping/admin')),
				array('label' => '退货单', 'url' => array('/mall/refund/admin')),
			    ), 'visible' => !Yii::app()->user->isGuest),
			array('label' => '用户控制', 'url' => '#', 'items' => array(
				array('label' => '会员列表', 'url' => array('/user/admin/admin')),
				array('label' => '管理员列表', 'url' => array('/adminUser/admin')),
				array('label' => '权限管理', 'url' => array('/auth/assignment/index')),
			    ), 'visible' => !Yii::app()->user->isGuest),
                array('label' => '插件列表', 'url' => array('/plugin/pluginmanage/index'),  'visible' => !Yii::app()->user->isGuest),
			array('label' => '系统设置', 'url' => '#', 'items' => array(
				array('label' => '菜单管理', 'url' => array('/menu/admin')),
				array('label' => '分类管理', 'url' => array('/category/admin')),
				array('label' => '皮肤管理', 'url' => array('/theme/admin')),
				array('label' => '语言管理', 'url' => array('/language/admin')),
				array('label' => '货币管理', 'url' => array('/currency/admin')),
			    ), 'visible' => !Yii::app()->user->isGuest),
		    ),
		),
		array(
		    'class' => 'bootstrap.widgets.TbMenu',
		    'htmlOptions' => array('class' => 'pull-right'),
		    'items' => array(
			array('label' => '网站前台', 'url' => Yii::app()->request->hostInfo . Yii::app()->baseUrl . '/../../frontend/www'),
			array('label' => '站点配置', 'icon' => 'wrench', 'url' => array('/settings/index'), 'visible' => !Yii::app()->user->isGuest),
			array('label' => '登录', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
			array('label' => Yii::app()->user->name, 'icon' => 'user', 'url' => '#', 'items' => array(
				array('label' => '个人资料', 'icon' => 'user', 'url' => '#'),
				array('label' => '退出', 'icon' => 'off', 'url' => array('/site/logout'))
			    ), 'visible' => !Yii::app()->user->isGuest),
		    ),
		),
	    ),
	));
	?>    

        <div class="container-fluid" id="page">

	    <?php echo $content; ?>

            <div class="clear"></div>

            <footer>
                <div class="row-fluid">
                    <div class="span12">
                        <p class="powered"><?php echo Yii::powered(); ?> 
                            / <?php echo CHtml::link('Yincart', 'http://yincart.com'); ?>
			    <span class="copy">Copyright &copy; <?php echo date('Y'); ?> by <?php echo F::sg('site', 'name'); ?>. All Rights Reserved.</span>
			</p>
		    </div>
                </div>
            </footer><!-- footer -->

        </div><!-- page -->

    </body>
</html>
