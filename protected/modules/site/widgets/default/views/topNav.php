<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/login_nav.js'); ?>

<div class="col-lg-6">
    <?php echo CHtml::link('收藏网站', F::baseUrl(), array(rel => "sidebar", 'onclick' => "addFavorite();"));
    echo '&nbsp;&nbsp;' . CHtml::link('官网', Yii::app()->getBaseUrl(true));?>
    <span class="cor_red bold font14">Tel: 13967414054</span>
    <?php echo CHtml::link('在线客服', array('page/contact', 'key' => 'help')); ?>
</div>
<div class="col-lg-6">
    <ul class="top_right_nav">
        <?php if (Yii::app()->user->isGuest) { ?>
            <li><?php echo CHtml::link('登录', array('/user/login')) ?></li>
            <li><?php echo CHtml::link('注册', array('/user/registration')) ?></li>
        <?php } else { ?>
            <li>您好，<?php echo Yii::app()->user->name ?>，欢迎来到<?php echo Yii::app()->name ?>！</li>
            <li><?php echo CHtml::link(Yii::t('main', 'log out'), array('/user/logout')) ?></li>
        <?php } ?>
    </ul>
</div>

<?php
/*$this->widget('zii.widgets.CMenu', array(
    'htmlOptions'=>array("style"=>"margin: 0; padding: 0;"),
    'items'=>array(
        array('label'=>Yii::t('main', 'Member Center'), 'url'=>array('//member'),'itemOptions'=>array('class'=>'personal-center')),
        array('label'=>Yii::t('main', 'personal data'), 'url'=>array('//user/profile/edit'),'itemOptions'=>array('class'=>'personal-list')),
        array('label'=>Yii::t('main', 'delivery address'), 'url'=>array('//member/delivery_address/admin'),'itemOptions'=>array('class'=>'personal-list')),
        array('label'=>Yii::t('main', 'my order'), 'url'=>array('//member/orderlist/admin'),'itemOptions'=>array('class'=>'personal-list')),
        array('label'=>Yii::t('main', 'my collect'), 'url'=>array('//member/wishlist/admin'),'itemOptions'=>array('class'=>'personal
*/
?>