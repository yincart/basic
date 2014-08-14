<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/slides.jquery.js'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/pptBox.js'); ?>
<div class="warp_contant">
    <div class="float">
        <div class="float_button">
            <a href="/basic/page/contact?key=help">联系<br/>在线客服</a>
        </div>
    </div>
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
                        <div class="warp_tab_list">
                            <div class="tab_img"><a href="<?php echo $itemUrl; ?>">
                                    <?php
                                    $picUrl=$hotItem->getMainPic();
                                    if(!empty($picUrl)){
                                        echo CHtml::image($hotItem->getMainPic(), $hotItem->title, array('width' => 220, 'height' => '220'));
                                    }else {
                                        $picUrl=$hotItem->getHolderJs('220','220');
                                       ?> <img alt="<?php echo $hotItem->title; ?>" src="<?php echo $picUrl; ?>"
                                         width="220" height="220"></a><?php
                                    }
                                    ?>
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
            <div class="news_tit"><?php echo CHtml::link('更多>>', Yii::app()->createUrl('cms/news/index', array())); ?></div>
            <div class="news_c">
                <div class="news_img">
                    <script>
                        var box = new PPTBox();
                        box.width = 180; //宽度
                        box.height = 178;//高度
                        box.autoplayer = 5;//自动播放间隔时间
                        //box.add({"url":"图片地址","title":"悬浮标题","href":"链接地址"})
                        <?php
                        $num=0;
                              foreach($post as $post){
                                  if($num==3){
                                    break;
                                  }
                                  if(!empty($post->pic_url)){
                                     $imageHelper=new ImageHelper();
                                            $picUrl=$imageHelper->thumb('180','178',$post->pic_url);
                                            $post=Yii::app()->createUrl("post/$post->id");
                                            echo 'box.add({"url": "'. $picUrl.'", "href": "'.$post.'", "title": "'.$post->title.'"});';
                                            $num++;
                                  }
                               }
                            //else echo 'box.add({"url": "image/tu2.jpg", "href": "", "title": "no data"});';
                ?>
                        box.show();
                    </script>
                </div>
                <ul class="news_list">
                    <?php
                    $class = 'current';
                    foreach ($posts as $post) {
                        echo '<li class="' . $class . '"><a href="' . Yii::app()->createUrl('cms/news/view', array('id' => $post->id)) . '">' . $post->title . '</a></li>';
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
                <div class="product_new contaniner_24">
                    <div class="product_new_tit"><label><?php echo $category_name; ?></label><a href="<?php echo Yii::app()->baseUrl.'/'.Menu::model()->getUrl($category_name).'&sort=newd';?>">更多新品>></a></div>
                    <div class="product_c">
                    <?php  if(!isset($newItem)){?>
                        <div class="product_new_b">
                            <?php $newItem = $items[0];
                            $itemUrl = Yii::app()->createUrl('item/view', array('id' => $newItem->item_id));
                            ?>



                            <div class="product_img_b"><a href="<?php echo $itemUrl; ?>">
                                 <?php
                                      if( $newItem->getMainPic()){
                                           $picUrl=$image->thumb('470','530', $newItem->getMainPic());
                                                                        $picUrl=Yii::app()->baseUrl.$picUrl;
                                                                    }else $picUrl=$newItem->getHolderJs('470','530');
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
                    <?php  }?>
                        <div class="product_list">
                            <?php for ($i = 1, $count = count($items); $i < $count; $i++) {
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
                                        <div class="product_price_p"><?php echo $newItem->currency . $newItem->price ?></div>
                                        <div class="product_price_v"><a href="<?php echo $itemUrl; ?>">详情点击</a></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
           <?php } else { ?>
                <div class="product_cate contaniner_24">
                    <div class="product_cate_tit<?php echo $num; ?>"><label><?php echo $category_name; ?></label><a href="<?php echo Yii::app()->baseUrl.'/'.Menu::model()->getUrl($category_name).'&sort=newd';?>">更多新品>></a></div>
                    <div class="product_ca">
                        <div class="product_list_ca">
                            <?php foreach ($items as $newItem) {
                                $itemUrl = Yii::app()->createUrl('item/view', array('id' => $newItem->item_id));
                                ?>
                                <div class="product_e">
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