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
                            <?php
                              $recommendItems=Item::model()->findAll(array(
                                  'condition'=>'is_best=?',
                                  'params'=>array('1'),
                                  'limit'=>3,
                              ));
                              $num=count(recommendItems);
                              if($num>0){
                                  foreach($recommendItems as $value){?>
                                         box.add({"url": "<?php echo $value->getMainPic()?>", "href": "", "title": "<?php echo $value->title?>"});
                                    <?php
                                            }
                                        }else echo 'box.add({"url": "image/tu2.jpg", "href": "", "title": "no data"});';
                            ?>
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
                $getprops = empty($params['props']) ? array() : array_flip(explode(';', $params['props']));
                if ($itemProps) {
                    foreach ($itemProps as $itemProp) {
                        ?>
                        <ul>
                            <li><?php echo $itemProp->prop_name; ?>：</li>
                            <?php foreach ($itemProp->propValues as $propValue) {
                                $props = $getprops;
                                $pvid = $propValue->item_prop_id . ':' . $propValue->prop_value_id;
                                if (array_key_exists($pvid, $props)) {
                                    unset($props[$pvid]);
                                    $class = 'prop-select';
                                } else {
                                    $props[$pvid] = '';
                                    $class = '';
                                }
                                $params['props'] = implode(';', array_keys($props));
                                echo '<li><a class="' . $class . '" href="' . Yii::app()->createUrl('catalog/index', $params) . '">' . $propValue->value_name . '</a></li>';
                            } ?>
                        </ul>
                    <?php
                    }
                }
                ?>
            </div>
            <div class="pd_sort">
                <a href="<?php echo Yii::app()->createUrl('catalog/index', array_merge($_GET, array('sort' => 'soldd'))); ?>">
                    <div class="pd_sort_sold current">销量</div>
                </a>
                <a href="<?php echo Yii::app()->createUrl('catalog/index', array_merge($_GET, array('sort' => 'priced'))); ?>">
                    <div class="pd_sort_price">价格</div>
                </a>
                <a href="<?php echo Yii::app()->createUrl('catalog/index', array_merge($_GET, array('sort' => 'newd'))); ?>">
                    <div class="pd_sort_new">最新</div>
                </a>

                <div class="pd_search">
                    <form method="get">
                        价格
                        <input id="floor_price" name="floor_price" type="text"
                               value="<?php echo empty($_GET['floor_price']) ? '' : $_GET['floor_price']; ?>"/>
                        到
                        <input id="top_price" name="top_price" type="text"
                               value="<?php echo empty($_GET['top_price']) ? '' : $_GET['top_price']; ?>"/>
                        <input id="price_search" type="submit" value="确定" data-url="<?php echo json_encode($_GET); ?>"/>
                        <?php foreach ($_GET as $key => $value) {
                            if (!in_array($key, array('floor_price', 'top_price')))
                                echo '<input type="hidden" name="' . $key . '" value="' . $value . '" />';
                        } ?>
                    </form>
                </div>
                <div class="pd_check">
                    <label><input id="has_stock" name="has_stock" type="checkbox"
                                  <?php echo !empty($_GET['has_stock']) && $_GET['has_stock'] ? 'checked' : ''; ?>
                                  data-url="<?php echo Yii::app()->createUrl('catalog/index', array_merge($_GET, array('has_stock' => !empty($_GET['has_stock']) && $_GET['has_stock'] ? 0 : 1))) ?>"/>
                        仅显示有货</label>
                </div>
                <div class="pd_page">
                    <?php if ($pager->pageCount > 1 || true) {
                        if ($pager->currentPage == 0 && false) {
                            echo '<span class="end"><a href="javascript:void(0)" class="page_p"><img alt="" src=""/>上一页</a></a></span>';
                        } else {
                            echo '<span><a href="' . Yii::app()->createUrl('catalog/index', array_merge($_GET, array('page' => $pager->currentPage))) . '" class="page_p"><img alt="" src=""/>上一页</a></a></span>';
                        }
                        echo ($pager->currentPage + 1) . '/' . $pager->pageCount;
                        if ($pager->currentPage >= $pager->pageCount - 1 && false) {
                            echo '<span class="end"><a href="javascript:void(0)" class="page_n"><img alt="" src=""/>下一页</a></a></span>';
                        } else {
                            echo '<span><a href="' . Yii::app()->createUrl('catalog/index', array_merge($_GET, array('page' => $pager->currentPage))) . '" class="page_n"><img alt="" src=""/>下一页</a></a></span>';
                        }
                    } ?>
                </div>
            </div>
            <div class="pd_pd">
                <?php foreach ($items as $item) {
                    $itemUrl = Yii::app()->createUrl('item/view', array('id' => $item->item_id));
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
                <?php if ($pager->pageCount > 1 || true) {
                    if ($pager->currentPage == 0 && false) {
                        echo '<span class="end"><a href="javascript:void(0)" class="page_p"><img alt="" src=""/>首页</a></a></span>';
                        echo '<span class="end"><a href="javascript:void(0)" class="page_p"><img alt="" src=""/>上一页</a></a></span>';
                    } else {
                        echo '<span><a href="' . Yii::app()->createUrl('catalog/index', array_merge($_GET, array('page' => 0))) . '" class="page_p"><img alt="" src=""/>首页</a></a></span>';
                        echo '<span><a href="' . Yii::app()->createUrl('catalog/index', array_merge($_GET, array('page' => $pager->currentPage))) . '" class="page_p"><img alt="" src=""/>上一页</a></a></span>';
                    }
                    for ($i = 0; $i < $pager->pageCount; $i++) {
                        $class = $i == $pager->currentPage ? 'current' : '';
                        echo '<span class="' . $class . '"><a href="' . Yii::app()->createUrl('catalog/index', array_merge($_GET, array('page' => $i))) . '">' . ($i + 1) . '</a></span>';
                    }
                    if ($pager->currentPage >= $pager->pageCount - 1 && false) {
                        echo '<span class="end"><a href="javascript:void(0)" class="page_n"><img alt="" src=""/>下一页</a></a></span>';
                        echo '<span class="end"><a href="javascript:void(0)" class="page_n"><img alt="" src=""/>末页</a></a></span>';
                    } else {
                        echo '<span><a href="' . Yii::app()->createUrl('catalog/index', array_merge($_GET, array('page' => $pager->currentPage))) . '" class="page_n"><img alt="" src=""/>下一页</a></a></span>';
                        echo '<span><a href="' . Yii::app()->createUrl('catalog/index', array_merge($_GET, array('page' => $pager->pageCount - 1))) . '" class="page_n"><img alt="" src=""/>末页</a></a></span>';
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#has_stock').click(function () {
            window.location.href = $(this).data('url');
        });
    });
</script>