<?php Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl . '/css/product.css'); ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/pptBox.js'); ?>
<div class="warp_contant">
    <div class="float">
        <div class="float_button">
            <a href="">联系<br/>在线客服</a>
        </div>
    </div>
    <div class="pd_l">
        <div class="pd_l_fl">
            <div class="pd_l_nv">
                <div class="pd_l_ti">
                    <a href="<?php echo Yii::app()->baseUrl; ?>">首页>></a>
                    <?php foreach ($this->breadcrumbs as $breadcrumb) {
                        echo '<a href="' . $breadcrumb['url'] . '">' . $breadcrumb['name'] . '</a>';
                    } ?>
                </div>
                <h2>所有分类</h2>
                <?php
                $root = Category::model()->findByPk(3);
                $children = $root->children()->findAll();
                $params = array();
                if (!empty($_GET['key'])) {
                    $params['key'] = $_GET['key'];
                }
                foreach ($children as $child) {
                    $params['cat'] = $child->getUrl();
                    echo '<div class="pd_l_ca"><a href="' . Yii::app()->createUrl('catalog/index', $params) . '">' . $child->name . '</a></div>';
                    echo '<ul class="pd_ca_list" >';
                    $leafs = $child->children()->findAll();
                    foreach ($leafs as $leaf) {
                        $params['cat'] = $leaf->getUrl();
                        echo '<li><a href="' . Yii::app()->createUrl('catalog/index', $params) . '">' . $leaf->name . '</a></li>';
                    }
                    echo '</ul>';
                } ?>
            </div>
            <div class="pd_l_slider">
                <h2>推荐产品</h2>

                <div class="pd_slider_img">
                    <div id="xxx">
                        <script>
                            var box = new PPTBox();
                            box.width = 180; //宽度
                            box.height = 178;//高度
                            box.autoplayer = 5;//自动播放间隔时间
                            //box.add({"url":"图片地址","title":"悬浮标题","href":"链接地址"})
                            box.add({"url": "image/tu3.jpg", "href": "", "title": "悬浮提示标题1"})
                            box.add({"url": "image/tu2.jpg", "href": "", "title": "悬浮提示标题2"})
                            box.add({"url": "image/tu3.jpg", "href": "", "title": "悬浮提示标题3"})
                            box.add({"url": "image/tu2.jpg", "href": "", "title": "悬浮提示标题4"})
                            box.show();
                        </script>
                    </div>
                </div>
                <div class="pd_slider_arr">
                </div>
            </div>
        </div>
        <div class="pd_l_fr">
            <div class="searh_res">找到了 <span class="cor_red blod">搜索词</span> 共计 <span class="cor_red blod">100</span>
                款供您选择
            </div>
            <div class="pd_select">
                <?php if ($categories) { ?>
                    <ul>
                        <li>分类：</li>
                        <?php foreach ($categories as $cate) {
                            $params['cat'] = $cate->getUrl();
                            echo '<li><a href="' . Yii::app()->createUrl('catalog/index', $params) . '">' . $cate->name . '</a></li>';
                        } ?>
                    </ul>
                <?php
                }
                $params = $_GET;
                if ($itemProps) {
                    foreach ($itemProps as $itemProp) {
                        ?>
                        <ul>
                            <li><?php echo $itemProp->prop_name; ?>：</li>
                            <?php foreach ($itemProp->propValues as $propValue) {
                                echo '<li><a href="' . Yii::app()->createUrl('catalog/index', $params) . '">' . $propValue->value_name . '</a></li>';
                            } ?>
                        </ul>
                    <?php
                    }
                }
                ?>
            </div>
            <div class="pd_sort">
                <div class="pd_sort_sold current">销量</div>
                <div class="pd_sort_price">价格</div>
                <div class="pd_sort_new">最新</div>
                <div class="pd_search">
                    <form>
                        价格
                        <input type="text"/>
                        到
                        <input type="text"/>
                        <input type="submit" value="确定"/>
                    </form>
                </div>
                <div class="pd_check">
                    <input type="checkbox" value="checked"/>
                    仅显示有货
                </div>
                <div class="pd_page">
                    <span class="end"><a href="" class="page_p"><img alt="" src=""/>上一页</a></span>
                    1/10
                    <span><a href="" class="page_n">下一页</a></span>
                </div>
            </div>
            <div class="pd_pd">
                <?php foreach ($items as $item) {
                    $itemUrl = Yii::app()->createUrl('item/index', array('id' => $item->item_id));
                    ?>
                    <div class="product_pd">
                        <div class="product_img"><a href="<?php echo $itemUrl; ?>">
                                <img alt="<?php echo $item->title; ?>"
                                     src="<?php echo $item->getMainPic(); ?>" width="220" height="220"></a>
                        </div>
                        <div class="product_name">
                            <a href="<?php echo $itemUrl; ?>"><?php echo $item->title; ?></a>
                        </div>
                        <div class="product_price">
                            <div class="product_price_n"><?php echo $item->currency . $item->price ?></div>
                            <div class="product_price_p"><?php echo $item->currency . $item->price ?></div>
                            <div class="product_price_v"><a href="<?php echo $itemUrl; ?>">详情点击</a></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="page_p">
                <span class="end"><a href="<?php echo $this->createUrl(''); ?>" class="page_p">
                        <img alt="" src=""/>首页</a></a></span>
                <span class="end"><a href="" class="page_p"><img alt="" src=""/>上一页</a></a></span>
                <?php for ($i = 1; $pager->pageCount; $i++) {
                    $class = $i == $pager->currentPage ? 'current' : '';
                    echo '<span class="' . $class . '"><a href="' . $this->createUrl('') . '">' . $i . '</a></span>';
                } ?>
                <span><a href="" class="page_n">下一页</a></span>
                <span><a href="" class="page_n">末页</a></span>
            </div>
        </div>
    </div>
</div>