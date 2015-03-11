<nav id='main-nav'>
    <div class='navigation'>
        <div class='search'>
            <form action='search_results.html' method='get'>
                <div class='search-wrapper'>
                    <input value="" class="search-query" placeholder="Search..." autocomplete="off" name="q" type="text" />
                    <button class='btn btn-link icon-search' name='button' type='submit'></button>
                </div>
            </form>
        </div>
        <?php
//        $this->widget('bootstrap.widgets.TbNav', array(
//            'type' => TbHtml::NAV_TYPE_LIST,
//            'items' => array(
//                array('label' => 'List header'),
//                array('label' => 'Home', 'url' => '#', 'active' => true),
//                array('label' => 'Library', 'url' => '#'),
//                array('label' => 'Applications', 'url' => '#'),
//                array('label' => 'Another list header'),
//                array('label' => 'Profile', 'url' => '#'),
//                array('label' => 'Settings', 'url' => '#'),
//                TbHtml::menuDivider(),
//                array('label' => 'Help', 'url' => '#'),
//            )
//        ));
        $url = str_replace('/backend.php?r=', '', Yii::app()->request->requestUri);
//        echo $url.'<br />';
//        echo strrpos($url, 'cms');
        ?>
        <ul class='nav nav-stacked'>
            <li class='<?php echo $url == 'core/default/index' ? 'active' : ''?>'>
                <a href='<?php echo Yii::app()->createUrl('/core/default/index') ?>'>
                    <i class='icon-dashboard'></i>
                    <span>控制面板</span>
                </a>
            </li>
            <li class='<?php echo strrpos($url, 'cms') !== false ? 'active' : ''?>'>
                <a class="dropdown-collapse" href="<?php echo Yii::app()->createUrl('/cms/default/index') ?>"><i class='icon-book'></i>
                    <span>内容管理</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>
                <ul class='<?php echo strrpos($url, 'cms') !== false ? 'in' : ''?> nav nav-stacked'>
                    <li class='<?php echo $url == 'cms/contentCategory/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/contentCategory/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>内容分类</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/page/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/page/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>单页管理</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/post/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/post/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>文章管理</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/comment/index' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/comment/index') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>评论管理</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/feedback/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/feedback/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>留言管理</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/video/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/video/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>视频管理</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/ad/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/ad/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>广告管理</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/friendLink/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/friendLink/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>友情链接</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/newsletterSubscriber/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/newsletterSubscriber/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>邮件订阅</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/customerService/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/customerService/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>客服管理</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'cms/case/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/cms/case/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>案例管理</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo strrpos($url, 'catalog') !== false ? 'active' : ''?>">
                <a class='dropdown-collapse ' href='#'>
                    <i class='icon-glass'></i>
                    <span>商品管理</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>
                <ul class='<?php echo strrpos($url, 'catalog') !== false ? 'in' : ''?> nav nav-stacked'>
                    <li class='<?php echo $url == 'catalog/itemCategory/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/catalog/itemCategory/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>商品分类</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'catalog/itemProp/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/catalog/itemProp/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>类目属性</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'catalog/itemBackend/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/catalog/itemBackend/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>商品列表</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo strrpos($url, 'sale') !== false ? 'active' : ''?>">
                <a class='dropdown-collapse ' href='#'>
                    <i class='icon-inbox'></i>
                    <span>销售管理</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>
                <ul class="<?php echo strrpos($url, 'sale') !== false ? 'in' : ''?> nav nav-stacked">
                    <li class='<?php echo $url == 'sale/order/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/sale/order/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>订单列表</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'sale/refund/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/sale/refund/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>退货列表</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo strrpos($url, 'payment') !== false ? 'active' : ''?>">
                <a class='dropdown-collapse ' href='#'>
                    <i class='icon-usd'></i>
                    <span>支付管理</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>
                <ul class='<?php echo strrpos($url, 'payment') !== false ? 'in' : ''?> nav nav-stacked'>
                    <li class='<?php echo $url == 'payment/paymentMethod/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/payment/paymentMethod/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>支付方式</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'payment/payment/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/payment/payment/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>支付清单</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo strrpos($url, 'shipping') !== false ? 'active' : ''?>">
                <a class='dropdown-collapse ' href='#'>
                    <i class='icon-plane'></i>
                    <span>物流管理</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>
                <ul class='<?php echo strrpos($url, 'shipping') !== false ? 'in' : ''?> nav nav-stacked'>
                    <li class='<?php echo $url == 'shipping/shippingMethod/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/shipping/shippingMethod/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>物流方式</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'shipping/shipping/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/shipping/shipping/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>发货单</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class='<?php echo $url == 'review' ? 'active' : ''?>'>
                <a href='<?php echo Yii::app()->createUrl('/review') ?>'>
                    <i class='icon-mail-reply'></i>
                    <span>评价管理</span>
                </a>
            </li>
<!--            <li class=''>-->
<!--                <a class='dropdown-collapse ' href='#'>-->
<!--                    <i class='icon-magic'></i>-->
<!--                    <span>市场营销</span>-->
<!--                    <i class='icon-angle-down angle-down'></i>-->
<!--                </a>-->
<!--                <ul class='nav nav-stacked'>-->
<!--                    <li class=''>-->
<!--                        <a href='#'>-->
<!--                            <i class='icon-caret-right'></i>-->
<!--                            <span>营销方式</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li class=''>-->
<!--                        <a href='#'>-->
<!--                            <i class='icon-caret-right'></i>-->
<!--                            <span>商品雷达</span>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
<!--            <li class=''>-->
<!--                <a href='javascript:void(0)'>-->
<!--                    <i class='icon-signal'></i>-->
<!--                    <span>统计报表</span>-->
<!--                </a>-->
<!--            </li>-->
            <li class="<?php echo strrpos($url, 'user') !== false || strrpos($url, 'auth') !== false ? 'active' : ''?>">
                <a class='dropdown-collapse ' href='#'>
                    <i class='icon-group'></i>
                    <span>用户管理</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>
                <ul class='<?php echo strrpos($url, 'user') !== false || strrpos($url, 'auth') !== false ? 'in' : ''?> nav nav-stacked'>
                    <li class='<?php echo strrpos($url, 'user') !== false ? 'active' : ''?>'>
                        <a href='<?php echo F::url('/user/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>会员列表</span>
                        </a>
                    </li>
                    <li class='<?php echo strrpos($url, 'auth') !== false ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/auth') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>权限管理</span>
                        </a>
                    </li>
                </ul>
            </li>
<!--            <li class=''>-->
<!--                <a href='--><?php //echo Yii::app()->createUrl('/marketplace/template/list') ?><!--'>-->
<!--                    <i class='icon-th'></i>-->
<!--                    <span>模板市场</span>-->
<!--                </a>-->
<!--            </li>-->
<!--            <li>-->
<!--                <a  href='--><?php //echo Yii::app()->createUrl('/marketplace/extension/list') ?><!--'>-->
<!--                    <i class='icon-cogs'></i>-->
<!--                    <span>扩展组件</span>-->
<!--                </a>-->
<!--            </li>-->
            <li class="<?php echo strrpos($url, 'core') !== false ? 'active' : ''?>">
                <a class='dropdown-collapse ' href='#'>
                    <i class='icon-cog'></i>
                    <span>系统管理</span>
                    <i class='icon-angle-down angle-down'></i>
                </a>
                <ul class='<?php echo strrpos($url, 'core') !== false ? 'in' : ''?> nav nav-stacked'>
                    <li class='<?php echo $url == 'core/category/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/core/category/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>分类管理</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'core/menu/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/core/menu/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>菜单管理</span>
                        </a>
                    </li>

                    <li class='<?php echo $url == 'core/elfinder/admin' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/core/elfinder/admin') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>图片空间</span>
                        </a>
                    </li>
                    <li class='<?php echo $url == 'core/settings/index' ? 'active' : ''?>'>
                        <a href='<?php echo Yii::app()->createUrl('/core/settings/index') ?>'>
                            <i class='icon-caret-right'></i>
                            <span>系统配置</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>