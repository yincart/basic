<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl . "/themes/pidiao/js/login_nav.js");
?>

<div class="top_right">
                <span>您好，欢饮来到皮雕软包耗材批发商城！</span>
    <?php if (Yii::app()->user->isGuest) { ?>
        <div class="login-nav"><?php echo CHtml::link('登录', array('/user/login')) ?>
            |<?php echo CHtml::link('注册', array('/user/registration')) ?></div>
    <?php } else { ?>
        <div class="login-nav">欢迎您，<?php echo Yii::app()->user->name ?></div>
        <div class="login-nav"><?php echo CHtml::link('退出', array('/user/logout')) ?></div>
        <div class="login-nav2"><?php $this->widget('zii.widgets.CMenu', array(
                'items'=>array(
                    array('label'=>'会员中心', 'url'=>array('//member'),'itemOptions'=>array('class'=>'personal-center')),
                    array('label'=>'personal data', 'url'=>array('//user/profile/edit'),'itemOptions'=>array('class'=>'personal-list')),
                    array('label'=>'delivery address', 'url'=>array('//member/delivery_address/admin'),'itemOptions'=>array('class'=>'personal-list')),
                    array('label'=>'my order', 'url'=>array('//member/orderlist/admin'),'itemOptions'=>array('class'=>'personal-list')),
                    array('label'=>'my collect', 'url'=>array('//member/wishlist/admin'),'itemOptions'=>array('class'=>'personal-list')),
                ),
            ));
            ?></div>
    <?php } ?>
    <div class="top_daohang">网站导航<i>arrow</i></div>
    <a href="<?php echo Yii::app()->createUrl('/translate/translate/set', array('lang' => 'zh_cn')) ?>" class="current">中文</a><a href="<?php echo Yii::app()->createUrl('/translate/translate/set', array('lang' => 'en')) ?>">English</a>
</div>