<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta http-equiv="content-language" content="zh"/>
    <meta http-equiv="Cache-Control" content="max-age=7200"/>
    <meta content="IE=7" http-equiv="X-UA-Compatible"/>
    <link type='text/css' rel='stylesheet' href='<?php echo Yii::app()->theme->baseUrl; ?>/css/common.css'/>
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.4.4.min.js"></script>
    <title><?php echo Yii::app()->params['title']; ?></title>
<body>

<div class="top">
    <div class="top_contant">
        <div class="top_left">
            <a href="">收藏网站</a>
            <span>官网</span>
            <a href="" class="sina">新浪</a>
            <a href="" class="mart">商城</a>
            <span class="cor_red bold font14">Tel: 13967414054</span>
            <a href="" class="online_ser">在线客服</a>
        </div>
        <div class="top_right">
            <span>您好，欢饮来到皮雕软包耗材批发商城！</span>
            <a href="" class="cor_red">登陆</a>
            <a href="" class="cor_red">注册享好礼</a>

            <div class="top_center">我的账户<i>arrow</i></div>
            <div class="top_daohang">网站导航<i>arrow</i></div>
        </div>
    </div>
</div>
<div class="head">
    <div class="logo"><a href="<?php echo Yii::app()->baseUrl; ?>"><img alt=""
                                                                        src=""
                                                                        width="227" height="80"></a></div>
    <form class="search" method="get" action="<?php echo Yii::app()->createUrl('catalog/index'); ?>">
        <div class="search_box">
            <input name="key" type="text" value="<?php echo isset($_GET['key']) ? $_GET['key'] : ''; ?>"/>
            <button></button>
        </div>
        <div class="search_hot">
            热门搜索：<a href="">皮雕</a> <a href="">软皮</a> <a href="">压花</a>
        </div>
    </form>
    <div class="shopping_car">
        购物车有<span class="cor_red bold">0</span>件商品
    </div>
</div>
<div class="nav">
    <ul class="nav_list">
        <?php $class = isset(Yii::app()->params['categoryIds']) ? '' : 'current';
        echo '<li class="' . $class . '"><a href="' . Yii::app()->baseUrl . '">首页</a></li>';
        $categories = Category::model()->findAllByAttributes(array('root' => '3', 'level' => 2));
        foreach ($categories as $cate) {
            $class = isset(Yii::app()->params['categoryIds']) && in_array($cate->category_id, Yii::app()->params['categoryIds']) ? 'current' : '';
            echo '<li class="' . $class . '"><a href="' . Yii::app()->createUrl('catalog/index', array('cat' => $cate->category_id)) . '">' . $cate->name . '</a></li>';
        }
        ?>
    </ul>
</div>
<?php echo $content; ?>
<div class="footer">
    <div class="foot_c">
        <div class="foot_new">
            <ul>
                <li><span class="font14 bold">新手指南</span></li>
                <li><a href="">注册新用户</a></li>
                <li><a href="">如何订购</a></li>
                <li><a href="">如果修改订单</a></li>
            </ul>
        </div>
        <div class="foot_pay">
            <ul>
                <li><span class="font14 bold">支付方式</span></li>
                <li><a href="">支付方式</a></li>
                <li><a href="">账户提现及退款时效</a></li>
                <li><a href="">查看账户余额</a></li>
            </ul>
        </div>
        <div class="foot_set">
            <ul>
                <li><span class="font14 bold">配送方式</span></li>
                <li><a href="">配送费用及收费标准</a></li>
                <li><a href="">配送范围及配送时效</a></li>
                <li><a href="">签收注意事项</a></li>
            </ul>
        </div>
        <div class="foot_back">
            <ul>
                <li><span class="font14 bold">退换货服务</span></li>
                <li><a href="">退换货政策</a></li>
                <li><a href="">退换货流程</a></li>
                <li><a href="">隐私申明</a></li>
            </ul>
        </div>
        <div class="foot_help">
            <ul>
                <li><span class="font14 bold">帮助中心</span></li>
                <li><a href="">忘记密码</a></li>
                <li><a href="">常见问题</a></li>
                <li><a href="">在线客服</a></li>
                <li><a href="">联系我们</a></li>
            </ul>
        </div>
        <div class="foot_call">
            <p class="font14 bold">咨询电话</p>

            <p class="font14 bold cor_r">13967414054</p>
        </div>
    </div>
    <div class="foot_u">
        <p class="foot_link"><a href="">关于我们</a>|<a href="">联系我们</a>|<a href="">人才招聘</a>|<a href="">商家入驻</a>|<a href="">广告服务</a>|<a
                href="">手机商城</a>|<a href="">友情链接</a>|<a href="">销售联盟</a>|<a href="">皮雕社区</a>|<a href="">资源交流</a></p>

        <p>Copyright ? 2013 - 2015 皮雕软包耗材批发商城 All Rights Reserved. <a href="">站长统计</a></p>

        <p>银河方舟 全程技术支持</p>
    </div>
</div>
</body>
</html>
