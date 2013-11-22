<div class="go_pay"><?php echo CHtml::link('结算', array('/order/checkout'))?></div>
<div class="buy_car"><?php echo CHtml::link('购物车', array('/cart'))?>(<font style="color:red"><?php echo $this->getCount() ?></font>)</div>
<?php if(Yii::app()->user->isGuest){?>
<div class="login"><?php echo CHtml::link('登录', array('/user/login'))?>&nbsp;|&nbsp;<?php echo CHtml::link('注册', array('/user/registration'))?></div>
<?php }else{?>
<div class="login">欢迎您，<?php echo Yii::app()->user->name ?>&nbsp;|&nbsp;<?php echo CHtml::link('会员中心', array('/member'))?>&nbsp;|&nbsp;<?php echo CHtml::link('退出', array('/user/logout'))?></div>
<?php } ?>
<div class="lang"><a href="<?php echo Yii::app()->createUrl('/translate/translate/set', array('lang'=>'zh_cn')) ?>" class="current">中文</a>&nbsp;/&nbsp;<a href="<?php echo Yii::app()->createUrl('/translate/translate/set', array('lang'=>'en')) ?>">English</a></div>