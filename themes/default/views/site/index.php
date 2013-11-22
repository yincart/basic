<?php
$this->pageTitle=Yii::app()->name.' - 首页';

Yii::app()->clientScript->registerCoreScript('jquery');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/flash/js/jquery.KinSlideshow-1.2.1.min.js');
?>
<script type="text/javascript">
    var moveStyle
    var rand =parseInt(Math.random()*4)
    switch(rand){
        case 0:	moveStyle="left" ;break;
        case 1:	moveStyle="left" ;break;
        case 2:	moveStyle="left" ;break;
        case 3:	moveStyle="left" ;break;   
    }
    
    $(function(){
        $("#KinSlideshow1").KinSlideshow({
            moveStyle:moveStyle,
            titleBar:{titleBar_height:30,titleBar_bgColor:"",titleBar_alpha:0.5},
            titleFont:{TitleFont_size:12,TitleFont_color:"#FFFFFF",TitleFont_weight:"normal"},
            btn:{btn_bgColor:"#FFFFFF",btn_bgHoverColor:"#FF5500",btn_fontColor:"#000000",
                btn_fontHoverColor:"#FFFFFF",btn_borderColor:"#cccccc",
                btn_borderHoverColor:"#FF5500",btn_borderWidth:1}
        });
    })
</script>
<style type="text/css">
    #KinSlideshow{ overflow:hidden; width:990px; height:486px;}
</style>
    <div class="image_scroll">
        <?php $this->widget('widgets.default.WAd') ?>
    </div>
    <div class="category">
        <a href="<?php echo Yii::app()->createUrl('/item-list-new') ?>"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/new_pro.png" width="366" height="78"/></a>
        <a href="<?php echo Yii::app()->createUrl('/item-list-hot') ?>"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/hot_pro.png" width="315" height="78"/></a>
        <a href="<?php echo Yii::app()->createUrl('/item-list-best') ?>"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/value.png" width="309" height="78"/></a>
    </div>
    <div class="vip_pro">
        <a href="<?php echo Yii::app()->createUrl('/item-list-promote') ?>"><img alt="" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/vip_pro.png" width="990" height="117"/></a>
    </div>