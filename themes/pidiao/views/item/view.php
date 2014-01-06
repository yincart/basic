<?php $cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/product.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/deal.css');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/pptBox.js');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/lrtk.js');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/lrtk.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/themes/pidiao/css/cart/review.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/default/js/review.js');
Yii::app()->clientScript->registerCoreScript('jquery');
?>
<script type="text/javascript">
    function describe(n) {
        var tnum = $(".deal_describe_tit>li").length;
        for (i = 1; i <= tnum; i++) {
            if (i == n) {
                $("#describe_" + i).css("display", "");
                $(".deal_describe_tit>li")[i - 1].className = "current";
            } else {
                $("#describe_" + i).css("display", "none");
                $(".deal_describe_tit>li")[i - 1].className = "";
            }
        }
    }
</script>

<div class="warp_contant">
    <div class="float">
        <div class="float_button">
            <a href="">联系<br/>在线客服</a>
        </div>
    </div>
    <div class="deal">
        <div class="deal_tip">
            <a href="<?php echo Yii::app()->baseUrl; ?>">首页>></a>
            <?php foreach ($this->breadcrumbs as $breadcrumb) {
                echo '<a href="' . $breadcrumb['url'] . '">' . $breadcrumb['name'] . '</a>';
            } ?>
        </div>
        <div class="deal_pic">
            <div>
                <ul id="idNum" class="hdnum">
                    <?php foreach ($item->itemImgs as $itemImg) {
                        echo '<li><img src="' . $itemImg->pic . '" width="70" height="70"></li>';
                    } ?>
                </ul>
            </div>
            <div style="height: 450px; overflow: hidden;" id=idTransformView>
                <ul id=idSlider class=slider>
                    <?php foreach ($item->itemImgs as $itemImg) {
                        echo '<div><a href="javascript:void(0)" target="_blank"><img alt="' . $item->title . '" src="' . $itemImg->pic . '" width="450" height="450"/></a></div>';
                    } ?>
                </ul>
            </div>
        </div>
        <script language=javascript>
            mytv("idNum", "idTransformView", "idSlider", 450, 5, true, 2000, 5, true, "onmouseover");
            //按钮容器aa，滚动容器bb，滚动内容cc，滚动宽度dd，滚动数量ee，滚动方向ff，延时gg，滚动速度hh，自动滚动ii，
        </script>
        <form class="deal_info" id="deal">
            <div class="deal_tit"><?php echo $item->title; ?></div>
            <div class="deal_price">
                <span class="cor_red bold font30"><?php echo $item->currency . $item->price ?></span>
                <span class="cor_gray">市场价：<strong><?php echo $item->currency . $item->price ?></strong></span>
            </div>
            <div class="deal_sold">已售出 <span class="cor_red bold">30</span>台</div>
            <?php
            $skus = array();
            foreach ($item->skus as $sku) {
                $key = implode(';', json_decode($sku->props, true));
                $skus[$key] = json_encode(array('price' => $sku->price, 'stock' => $sku->stock));
            }
            ?>
            <div class="deal_size" data-sku-key='<?php echo json_encode(array_keys($skus)); ?>'
                 data-sku-value='<?php echo json_encode($skus); ?>'>
                <?php
                $propImgs = CHtml::listData($item->propImgs, 'item_prop_value', 'pic');
                $itemProps = $propValues = array();
                foreach ($item->category->itemProps as $itemProp) {
                    $itemProps[$itemProp->item_prop_id] = $itemProp;
                    foreach ($itemProp->propValues as $propValue) {
                        $propValues[$propValue->prop_value_id] = $propValue;
                    }
                }
                $pvids = json_decode($item->props);
                foreach ($pvids as $pid => $pvid) {
                    if (isset($itemProps[$pid]) && $itemProps[$pid]->is_sale_prop) {
                        $itemProp = $itemProps[$pid];
                        ?>
                        <p><span><?php echo $itemProp->prop_name ?>：</span>
                            <?php if (is_array($pvid)) {
                                foreach ($pvid as $v) {
                                    $ids = explode(':', $v);
                                    $propValue = $propValues[$ids[1]];
                                    if ($itemProp->is_color_prop && false) {
                                        ?>
                                        <a href="javascript:void(0)" data-value="<?php echo $v; ?>">
                                            <img alt="<?php echo $propValue->value_name; ?>"
                                                 src="<?php echo isset($propImgs[$v]) ? $propImgs[$v] : ''; ?>"
                                                 width="41" height="41"></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)"
                                           data-value="<?php echo $v; ?>"><?php echo $propValue->value_name; ?></a>
                                    <?php
                                    }
                                }
                            } else {
                                $ids = explode(':', $pvid);
                                $propValue = $propValues[$ids[1]];
                                if ($itemProp->is_color_prop && false) {
                                    ?>
                                    <a href="javascript:void(0)" data-value="<?php echo $pvid; ?>">
                                        <img alt="<?php echo $propValue->value_name; ?>"
                                             src="<?php echo isset($propImgs[$pvid]) ? $propImgs[$pvid] : ''; ?>"
                                             width="41" height="41"></a>
                                <?php } else { ?>
                                    <a href="javascript:void(0)"
                                       data-value="<?php echo $pvid; ?>"><?php echo $propValue->value_name; ?></a>
                                <?php
                                }
                            } ?>
                        </p>
                    <?php
                    }
                } ?>
            </div>
            <div class="deal_num">
                <span>我要买</span><span class="deal_num_c">
                    <a href="javascript:void(0)" class="minus"></a>
                    <label id="num"><?php echo $item->min_number; ?></label>
                    <input type="hidden" id="qty" name="qty" value="<?php echo $item->min_number; ?>" />
                    <a href="javascript:void(0)" class="add"></a></span>
                <span>（库存剩余 <label id="stock"><?php echo $item->stock; ?></label> 台）</span>
            </div>
            <input type="hidden" id="item_id" name="item_id" value="<?php echo $item->item_id; ?>" />
            <input type="hidden" id="props" name="props" value="" />
            <div class="deal_add_car" data-url="<?php echo Yii::app()->createUrl('cart/add'); ?>"><a href="javascript:void(0)">加入购物车</a></div>
        </form>
    </div>
    <div class="pd_l">
        <div class="pd_l_fl">
            <div class="pd_l_nv">
                <div class="pd_l_ti"><a href="">首页>></a><a href="">分类一</a></div>
                <h2>所有分类</h2>

                <div class="pd_l_ca">
                    分类A
                </div>
                <ul class="pd_ca_list">
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                </ul>
                <div class="pd_l_ca">
                    分类A
                </div>
                <ul class="pd_ca_list">
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                </ul>
                <div class="pd_l_ca">
                    分类A
                </div>
                <ul class="pd_ca_list">
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                    <li><a href="">分类B</a></li>
                </ul>
            </div>
            <div class="pd_l_intr">
                <h2>推荐产品</h2>
                <ul class="pd_intr_list">
                    <li>
                        <div class="intr_list_img"><a href=""><img alt="" src="" width="180" height="180"/></a></div>
                        <div class="intr_list_tit"><a href="">商品名称商品名称</a></div>
                        <div class="intr_list_price"><span class="cor_red bold">￥ 3000.00</span></div>
                    </li>
                    <li>
                        <div class="intr_list_img"><a href=""><img alt="" src="" width="180" height="180"/></a></div>
                        <div class="intr_list_tit"><a href="">商品名称商品名称</a></div>
                        <div class="intr_list_price"><span class="cor_red bold">￥ 3000.00</span></div>
                    </li>
                    <li>
                        <div class="intr_list_img"><a href=""><img alt="" src="" width="180" height="180"/></a></div>
                        <div class="intr_list_tit"><a href="">商品名称商品名称</a></div>
                        <div class="intr_list_price"><span class="cor_red bold">￥ 3000.00</span></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pd_l_fr">
            <ul class="deal_describe_tit">
                <li onclick="describe(1);" class="current">商品描述</li>
                <li onclick="describe(2);">顾客评价（<span class="cor_red">14</span>）</li>
                <li onclick="describe(3);">月成交记录（<span class="cor_red">2</span>）</li>
            </ul>
            <div class="deal_describe" id="describe_1" style="">
                <?php echo $item->desc; ?>
            </div>
            <div class="deal_describe" id="describe_2" style="display:none;">
             <?php    $this->widget('widgets.default.WReview',array(
                '_itemId'=> $item->item_id,
                '_entityId'=>'1',
                ))?>
<!--                <img src="" alt="顾客评价" width="980" height="800">-->
            </div>
            <div class="deal_describe" id="describe_3" style="display:none;">
                <img src="" alt="月成交记录" width="980" height="800">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        var skus = $('.deal_size').data('sku-value');
        var emptySkus = [];
        for (var i in skus) {
            var sku = $.parseJSON(skus[i]);
            if (sku['stock'] == "0") {
                emptySkus.push(';' + i + ';');
            }
        }
        $('.deal_size a').click(function () {
            var selectClass = $(this).find('img').length ? 'img-prop-select' : 'prop-select';
            if ($(this).attr('class') && $(this).attr('class').indexOf(selectClass) !== -1) {
                $(this).removeClass(selectClass);
            } else {
                $(this).parent().find('a').removeClass(selectClass);
                $(this).addClass(selectClass);
            }
            var selectPropValue = [];
            $('.prop-select,.img-prop-select').each(function () {
                selectPropValue.push($(this).data('value'));
            });
            selectPropValue = selectPropValue.join(';');
            $('#props').val(selectPropValue);
            if (skus[selectPropValue]) {
                var sku = $.parseJSON(skus[selectPropValue]);
                var price = $('.deal_price').find('span:eq(0)');
                price.text(price.text().substr(0, 1) + sku['price']);
                var price = $('.deal_price').find('strong');
                price.text(price.text().substr(0, 1) + sku['price']);
                $('#stock').text(sku['stock']);
            }

        });
        $('.add').click(function () {
            $('#num').text(parseInt($('#num').text()) + 1);
            $('#qty').val(parseInt($('#qty').val()) + 1);
        });
        $('.minus').click(function () {
            $('#num').text(parseInt($('#num').text()) - 1);
            $('#qty').val(parseInt($('#qty').val()) - 1);
        });
        $('.deal_add_car').click(function() {
            var selectProps = $('.prop-select,.img-prop-select');
            if (selectProps.length < $('.deal_size p').length) {
                $('.deal_size').addClass('prop-div-select');
            } else {
                $('.deal_size').removeClass('prop-div-select');
                $.post($(this).data('url'), $('#deal').serialize(), function(response) {
                    if (response.msg) {
                        alert(response.msg);
                    }
                }, 'json');
            }
        });
    });
</script>
