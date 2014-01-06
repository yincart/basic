<?php
$cs = Yii::app()->clientScript;
$cs->registerCoreScript('jquery');
$cs->registerScriptFile(Yii::app()->request->baseUrl . '/js/jquery.blockUI.1.33.js');
?>
<!doctype html>
<html>
    <head>
        <title><?php //echo CHtml::encode($this->pageTitle); ?><?php echo F::sg('seo', 'mainTitle');?></title>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

        <meta name="description" content=" <?php echo F::sg('seo','mainDescr')?>"/>

        <meta name="Keywords" content="<?php echo F::sg('seo','mainKwrds')?>"/>



        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/common.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/box.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/grid.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css"/>
        <link type="text/css" rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/core.css"/>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/backtop/js/scrolltop.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/js/common.js"></script>
	<script type="text/javascript" src="<?php echo F::baseUrl(); ?>/js/holder.js"></script>
        
    </head>
    <script type="text/javascript">
        var SITE_URL = "<?php echo Yii::app()->request->baseUrl ?>";
        var UserId  = '<?PHP echo Yii::app()->user->id ?>';
        var RETURN_URL = '<?PHP echo Yii::app()->request->url ?>';
    </script>
    <body>
        <div id="header">
            <div class="hd_top">
                <?php $this->widget('widgets.default.WTopNav') ?>
            </div>
            <div class="hd">
                <div class="hd2">
                    <div class="common_left"><a href="" title><img alt="logo" src="<?php echo Yii::app()->request->baseUrl ?>/images/logo.png" width="329" height="64"/></a></div>
                    <div class="common_right">
                        <?php $this->widget('widgets.default.WSearch') ?>
                        <div class="clear"></div>
                        <div class="phone">
                            订购热线：86 0579 86898388
                        </div>
                    </div>
                </div>			
            </div>
        </div>
        <div id="nav">
            <?php $this->widget('widgets.default.WMainMenu') ?>
        </div>
        <div class="container_25">
            <?php
            $this->widget('zii.widgets.CBreadcrumbs', array(
                'links' => $this->breadcrumbs,
                'homeLink' => '当前位置：首页'
            ));
            ?><!-- breadcrumbs -->

            <div class="main grid_25">
                <?php echo $content ?>
            </div>

            <div class="clear"></div>

            <div id="footer">
                <div class="helpcenter">
                    <?php $this->widget('widgets.default.WHelpCenter') ?>
                </div>
                <div class="line"></div>
                <div class="footnav">
                    <!--                <a href="">关于我们</a>&nbsp;|&nbsp;
                                    <a href="">联系我们</a>&nbsp;|&nbsp;
                                    <a href="">招聘信息</a>&nbsp;|&nbsp;
                                    <a href="">商城公告</a>&nbsp;|&nbsp;
                                    <a href="">行业新资讯</a>&nbsp;|&nbsp;
                                    <a href="">业务合作</a>&nbsp;|&nbsp;
                                    <a href="">网站地图</a>-->
                    <?php $this->widget('widgets.default.WFootMenu') ?>
                </div>
                <div class="paylink">
                    <?php //$this->widget('widgets.default.WFriendLink')  ?>
                </div>
                <div class="foot_copyright">
                    <p>Copyright &copy; <?php echo date('Y'); ?> by <?php echo F::sg('site', 'name'); ?>.All Rights Reserved.</p><?php echo F::sg('site','statistics')  ?>
                </div>

            </div>
        </div>
        <?php $this->widget('widgets.default.WCustomerService') ?>
        <?php echo Yii::app()->translate->renderMissingTranslationsEditor(); ?>
        <div style="display:none" id="goTopBtn"><a title="返回顶部" class="ui-scrolltop" id="J_ScrollTopBtn">返回顶部</a></div>
        <script type="text/javascript">goTopEx();</script>
        <script type="text/javascript" src="http://js.tongji.linezing.com/2863871/tongji.js"></script><noscript><a href="http://www.linezing.com"><img src="http://img.tongji.linezing.com/2863871/tongji.gif"/></a></noscript>
    </body>
</html>