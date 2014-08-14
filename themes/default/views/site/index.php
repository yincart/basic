<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/slides.jquery.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/pptBox.js'); ?>

<?php
$imageHelper=new ImageHelper();
Yii::app()->plugin->render('Hook_Login');
?>

<div class="warp_contant">
    <?php $this->widget('widgets.leather.WKefu') ?>
    <div class="warp_tab contaniner_24">
        <div class="warp_tab_con">
            <div class="warp_tab_t">
                <ul class="tab_t_list">
                    <?php
                    $i = 1;
                    $class = 'current';
                    foreach ($hotCategories as $hotCategory) {
                        echo '<li class="' . $class . '" onclick="change_bg(' . $i++ . ');">' . $hotCategory->name . '</li>';
                        $class = '';
                    }
                    $i = 1;
                    ?>
                </ul>
            </div>
            <?php foreach ($hotItems as $hotItemList) { ?>
                <div class="warp_tab_c" id="pop_<?php echo $i; ?>" <?php if($i!=1) echo "style='display: none;'"?>>
                    <?php $i++;
                    foreach ($hotItemList as $hotItem) {
                        $itemUrl = Yii::app()->createUrl('item/view', array('id' => $hotItem->item_id));
                        ?>
                        <div class="product_pd">
                            <div class="tab_img"><a href="<?php echo $itemUrl; ?>">
                                    <?php
                                    $picUrl=$hotItem->getMainPic();
                                    if(!empty($picUrl)){
                                        $picUrl=$imageHelper->thumb('220','220',$picUrl);
                                        $picUrl=yii::app()->baseUrl. $picUrl;
                                        echo CHtml::image($picUrl, $hotItem->title, array('width' => 220, 'height' => '220'));
                                    }else {
                                        $picUrl=$hotItem->getHolderJs('220','220');
                                       ?> <img alt="<?php echo $hotItem->title; ?>" src="<?php echo $picUrl; ?>"
                                         width="220" height="220"></a><?php
                                    }
                                    ?>
                                </a></div>
                            <div class="product_name_1">
                                <?php echo CHtml::link($hotItem->title, $itemUrl); ?>
                            </div>
                            <div class="tab_price">
                                <div class="tab_price_n"><?php echo $hotItem->currency . $hotItem->price ?></div>
                                <div class="tab_price_v"><?php echo CHtml::link('详情点击', $itemUrl); ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="warp_product">
        <?php $isFrist = true;
        $num = 0;
        foreach ($newItems as $category_name => $items) {
 ?>
                <div class="col-lg-12">


                    <div class="product_cate_tit<?php echo $num; ?>"><label><?php echo $category_name; ?></label><a href="<?php echo Yii::app()->baseUrl.'/'.Menu::model()->getUrl($category_name).'&sort=newd';?>">更多新品>></a></div>
                    <div class="product_c">
                        <div class="product_list">
                            <?php
                            for ($i = 0; $i < 5; $i++) {
                                if(!empty($items[$i])){
                                $newItem = $items[$i];
                                $itemUrl = Yii::app()->createUrl('item/view', array('id' => $newItem->item_id));
                                ?>
                                <div class="product_d">
                                    <div class="product_img"><a href="<?php echo $itemUrl; ?>">
                                            <?php
                                                if( $newItem->getMainPic()){
                                                    $image=new ImageHelper();
                                                    $picUrl=$image->thumb('220','220', $newItem->getMainPic());
                                                    $picUrl=Yii::app()->baseUrl.$picUrl;
                                                }else $picUrl=$newItem->getHolderJs('220','220');
                                            ?>
                                            <img alt="<?php echo $newItem->title; ?>" src="<?php echo $picUrl; ?>"
                                                 width="220" height="220"></a>
                                    </div>
                                    <div class="product_name">
                                        <a href="<?php echo $itemUrl; ?>"><?php echo $newItem->title; ?></a>
                                    </div>
                                    <div class="product_price">
                                        <div class="product_price_n"><?php echo $newItem->currency . $newItem->price ?></div>
                                        <div class="product_price_v"><a href="<?php echo $itemUrl; ?>">详情点击</a></div>
                                    </div>
                                </div>
                            <?php }} ?>
                        </div>
                    </div>
                </div>
<!--           --><?php //} else { ?>
<!--                <div class="product_cate contaniner_24">-->
<!--                    <div class="product_cate_tit--><?php //echo $num; ?><!--"><label>--><?php //echo $category_name; ?><!--</label><a href="--><?php //echo Yii::app()->baseUrl.'/'.Menu::model()->getUrl($category_name).'&sort=newd';?><!--">更多新品>></a></div>-->
<!--                    <div class="product_ca">-->
<!--                        <div class="product_list_ca">-->
<!--                            --><?php //foreach ($items as $newItem) {
//                                $itemUrl = Yii::app()->createUrl('item/view', array('id' => $newItem->item_id));
//                                ?>
<!--                                <div class="product_e">-->
<!--                                    <div class="product_img"><a href="--><?php //echo $itemUrl; ?><!--">-->
<!--                                            --><?php
//                                            if( $newItem->getMainPic()){
//                                            $image=new ImageHelper();
//                                            $picUrl=$image->thumb('220','220', $newItem->getMainPic());
//                                            $picUrl=Yii::app()->baseUrl.$picUrl;
//                                            }else $picUrl=$newItem->getHolderJs('220','220');
//                                            ?>
<!--                                            <img alt="--><?php //echo $newItem->title; ?><!--" src="--><?php //echo $picUrl; ?><!--"-->
<!--                                                 width="220" height="220"></a>-->
<!--                                    </div>-->
<!--                                    <div class="product_name">-->
<!--                                        <a href="--><?php //echo $itemUrl; ?><!--">--><?php //echo $newItem->title; ?><!--</a>-->
<!--                                    </div>-->
<!--                                    <div class="product_price">-->
<!--                                        <div-->
<!--                                            class="product_price_n">--><?php //echo $newItem->currency . $newItem->price ?><!--</div>-->
<!--                                        <div class="product_price_v"><a href="--><?php //echo $itemUrl; ?><!--">详情点击</a></div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            --><?php //} ?>
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            --><?php //}
            $num++;
            $isFrist = false;
        } ?>
    </div>
</div>
<!--<div class="clear"></div>-->
<!--    <div class="col-lg-8">-->
<!--        <div class="box">-->
<!--            <div class="box-title">最新新闻</div>-->
<!--            <div class="box-content"></div>-->
<!--        </div>-->
<!--        <div class="box">-->
<!--            <div class="box-title">产品视频</div>-->
<!--            <div class="box-content"></div>-->
<!--        </div>-->
<!--    </div>-->
<!--    <div class="col-lg-4">-->
<!--        <div class="box">-->
<!--            <div class="box-title">客户留言</div>-->
<!--            <div class="box-content"></div>-->
<!--        </div>-->
<!--    </div-->
<!--</div>-->
<div class="clear"></div>
<script type="text/javascript">
    //保证导航栏背景与图片轮播背景一起显示
//    $("#mainbody").removeClass();
//    $("#mainbody").addClass("index_bg01");
    $(function () {
        //滚动Banner图片的显示
        $('#slides').slidesjs({
            width: 940,
            height: 400,
            navigation: {
                active:true,
                effect:"fade"
            },
            effect:{
                fade:{
                    speed:200
                }
            },
            play: {
                active: true,
                // [boolean] Generate the play and stop buttons.
                // You cannot use your own buttons. Sorry.
                effect: "fade",
                // [string] Can be either "slide" or "fade".
                interval: 5000,
                // [number] Time spent on each slide in milliseconds.
                auto: true,
                // [boolean] Start playing the slideshow on load.
                swap: true,
                // [boolean] show/hide stop and play buttons
                pauseOnHover: false,
                // [boolean] pause a playing slideshow on hover
                restartDelay: 2500
                // [number] restart delay on inactive slideshow
            }
        });
    });
    function change_bg(n) {
        var tnum = $(".tab_t_list>li").length;
        for (i = 1; i <= tnum; i++) {
            if (i == n) {
                $("#pop_" + i).css("display", "");
                $(".tab_t_list>li")[i - 1].className = "current";
            } else {
                $("#pop_" + i).css("display", "none");
                $(".tab_t_list>li")[i - 1].className = "";
            }
        }
    }
</script>