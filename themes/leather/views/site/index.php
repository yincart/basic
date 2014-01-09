<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/slides.jquery.js'); ?>
<div class="warp_banner index_bg05" id="mainbody">
    <div id="slides" class="banner">
        <div class="banner_l">
            <a class="prev" href="#">
                <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/image/banner_l.png', '上一页', array('width' => '43', 'height' => '43')); ?>
            </a>
        </div>
        <div class="bannerImg">
            <div class="slides_container">
                <?php
                $i = 0;
                foreach ($ads as $ad) {
                    $i++;
                    echo <<<EOF
                <div id="banner_pic_$i">
                    <a href="{$ad->url}" target="_blank">
                        <img alt="{$ad->title}" src="{$ad->pic}" width="1180" height="500">
                    </a>
                </div>
EOF;
                }
                ?>
            </div>
        </div>
        <div class="banner_r">
            <a class="next" href="#">
                <?php echo CHtml::image(Yii::app()->theme->baseUrl . '/image/banner_r.png', '下一页', array('width' => '43', 'height' => '43')); ?>
            </a>
        </div>
    </div>
</div>
<div class="warp_contant">
    <div class="float">
        <div class="float_button">
            <a href="">联系<br/>在线客服</a>
        </div>
    </div>
    <div class="warp_tab">
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
                <div class="warp_tab_c" id="pop_<?php echo $i; ?>">
                    <?php foreach ($hotItemList as $hotItem) {
                        $itemUrl = Yii::app()->createUrl('item/view', array('id' => $hotItem->item_id));
                        ?>
                        <div class="warp_tab_list">
                            <div class="tab_img"><a href="<?php echo $itemUrl; ?>">
                                    <?php echo CHtml::image($hotItem->getMainPic(), $hotItem->title, array('width' => 220, 'height' => '220')) ?>
                                </a></div>
                            <div class="tab_name">
                                <?php echo CHtml::link($hotItem->title, $itemUrl); ?>
                            </div>
                            <div class="tab_price">
                                <div class="tab_price_n"><?php echo $hotItem->currency . $hotItem->price ?></div>
                                <div class="tab_price_p"><?php echo $hotItem->currency . $hotItem->price ?></div>
                                <div class="tab_price_v"><?php echo CHtml::link('详情点击', $itemUrl); ?></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
        <div class="warp_news">
            <div class="news_tit"><?php echo CHtml::link('更多>>', Yii::app()->createUrl('catalog/index', array())); ?></div>
            <div class="news_c">
                <div class="news_img">
                    <img alt="" src="" width="180" height="180"/>
                </div>
                <ul class="news_list">
                    <?php
                    $class = 'current';
                    foreach ($articles as $article) {
                        echo '<li class="' . $class . '"><a href="' . Yii::app()->createUrl('article/view', array('id' => $article->article_id)) . '">' . $article->title . '</a></li>';
                        $class = '';
                    } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="warp_product">
        <?php $isFrist = true;
        $num = 0;
        foreach ($newItems as $category_name => $items) {
            if ($isFrist) { ?>
                <div class="product_new">
                    <div class="product_new_tit"><label><?php echo $category_name; ?></label><a href="">更多新品>></a></div>
                    <div class="product_c">
                        <div class="product_new_b">
                            <?php $newItem = $items[0];
                            $itemUrl = Yii::app()->createUrl('item/view', array('id' => $newItem->item_id));
                            ?>
                            <div class="product_img_b"><a href="<?php echo $itemUrl; ?>">
                                    <?php
                                    if( $newItem->getMainPic()){
                                        $picUrl=$image->thumb('220','220', $newItem->getMainPic());
                                        $picUrl=Yii::app()->baseUrl.$picUrl;
                                    }else $picUrl='';
                                    ?>
                                    <img alt="<?php echo $newItem->title; ?>" src="<?php echo $picUrl; ?>"
                                         width="220" height="220"></a>
                            </div>
                            <div class="product_name">
                                <a href="<?php echo $itemUrl; ?>"><?php echo $newItem->title; ?></a>
                            </div>
                            <div class="product_price">
                                <div class="product_price_n"><?php echo $newItem->currency . $newItem->price ?></div>
                                <div class="product_price_p"><?php echo $newItem->currency . $newItem->price ?></div>
                                <div class="product_price_v"><a href="<?php echo $itemUrl; ?>">详情点击</a></div>
                            </div>
                        </div>
                        <div class="product_list">
                            <?php for ($i = 1, $count = count($items); $i < $count; $i++) {
                                $newItem = $items[$i];
                                $itemUrl = Yii::app()->createUrl('item/view', array('id' => $newItem->item_id));
                                ?>
                                <div class="product_d">
                                    <div class="product_img"><a href="<?php echo $itemUrl; ?>">
                                            <img alt="<?php echo $newItem->title; ?>"
                                                 src="<?php echo $newItem->getMainPic(); ?>" width="220" height="220"></a>
                                    </div>
                                    <div class="product_name">
                                        <a href="<?php echo $itemUrl; ?>"><?php echo $newItem->title; ?></a>
                                    </div>
                                    <div class="product_price">
                                        <div class="product_price_n"><?php echo $newItem->currency . $newItem->price ?></div>
                                        <div class="product_price_p"><?php echo $newItem->currency . $newItem->price ?></div>
                                        <div class="product_price_v"><a href="<?php echo $itemUrl; ?>">详情点击</a></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
           <?php } else { ?>
                <div class="product_cate">
                    <div class="product_cate_tit<?php echo $num; ?>"><label><?php echo $category_name; ?></label><a href="">更多新品>></a></div>
                    <div class="product_ca">
                        <div class="product_list_ca">
                            <?php foreach ($items as $newItem) {
                                $itemUrl = Yii::app()->createUrl('item/view', array('id' => $newItem->item_id));
                                ?>
                                <div class="product_d">
                                    <div class="product_img"><a href="<?php echo $itemUrl; ?>">
                                            <img alt="<?php echo $newItem->title; ?>"
                                                 src="<?php echo $newItem->getMainPic(); ?>" width="220" height="220"></a>
                                    </div>
                                    <div class="product_name">
                                        <a href="<?php echo $itemUrl; ?>"><?php echo $newItem->title; ?></a>
                                    </div>
                                    <div class="product_price">
                                        <div
                                            class="product_price_n"><?php echo $newItem->currency . $newItem->price ?></div>
                                        <div
                                            class="product_price_p"><?php echo $newItem->currency . $newItem->price ?></div>
                                        <div class="product_price_v"><a href="<?php echo $itemUrl; ?>">详情点击</a></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php }
            $num++;
            $isFrist = false;
        } ?>
    </div>
</div>
<script type="text/javascript">
    //保证导航栏背景与图片轮播背景一起显示
    $("#mainbody").removeClass();
    $("#mainbody").addClass("index_bg05");
    $(function () {
        //滚动Banner图片的显示
        $('#slides').slides({
            preload: false,
            preloadImage: '/images/loading.gif',
            effect: 'fade',
            slideSpeed: 400,
            fadeSpeed: 100,
            play: 3000,
            pause: 100,
            hoverPause: true
        });
        //$('#js-news').ticker();
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