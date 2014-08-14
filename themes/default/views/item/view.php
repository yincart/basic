 <?php
$cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/product.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/deal.css');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/pptBox.js');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/lrtk.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/cart/review.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/review.js');

$imageHelper=new ImageHelper();
/** @var Item $item */
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
    <?php $this->widget('widgets.leather.WKefu') ?>
    <div class="deal container_24">
        <div class="deal_tip">
            <a href="<?php echo Yii::app()->baseUrl.'/'; ?>">首页>></a>
            <?php foreach ($this->breadcrumbs as $breadcrumb) {
                echo '<a href="' . $breadcrumb['url'] . '">' . $breadcrumb['name'] . '</a>';
            } ?>
        </div>
        <div class="deal_pic clearfix">
            <div>
                <ul id="idNum" class="hdnum">
                    <?php foreach ($item->itemImgs as $itemImg) {
                        if(!empty($itemImg->pic)){
                            $picUrl=$imageHelper->thumb('70','70',$itemImg->pic);
                        }else $picUrl=$item->getHolderJs('70','70');
                        echo '<li><img src="' .$picUrl . '" width="70" height="70"></li>';
                    } ?>
                </ul>
            </div>
            <div style="width: 450px; height: 450px; overflow: hidden; position: relative;" id=idTransformView >
                <ul id=idSlider class=slider>
                    <?php foreach ($item->itemImgs as $itemImg) {
                        if($itemImg->pic){
                            $picUrl=$imageHelper->thumb('450','450',$itemImg->pic);
                        }else $picUrl=$item->getHolderJs('450','450');
                        //                        echo '<li><img src="' .$picUrl . '" width="450" height="450"></li>';
                        echo'<div><a href="javascript:void(0)" target="_blank" rel="nofollow"><img position=absolute   alt="' . $item->title . '" src="'  .$picUrl . '" width="450" height="450"/></a></div>';
                    } ?>
                </ul>
            </div>
        </div>
        <script language=javascript>
            mytv("idNum", "idTransformView", "idSlider", 450, 5, true, 2000, 5, true, "onmouseover");
            //按钮容器aa，滚动容器bb，滚动内容cc，滚动宽度dd，滚动数量ee，滚动方向ff，延时gg，滚动速度hh，自动滚动ii，
        </script>

        <form action="<?php echo Yii::app()->createUrl('order/checkout'); ?>" method="post" class="deal_info" id="deal">
            <div class="deal_tit"><?php echo $item->title; ?></div>
            <div class="deal_price">
                <span class="cor_red bold font30"><?php echo $item->currency . $item->price ?></span>
            </div>
            <div class="deal_sold">月销售量 <span class="cor_red bold"><?php echo $item->deal_count;?></span>&nbsp;件</div>
            <?php
            $skus = array();
            foreach ($item->skus as $sku) {

                $skuId[]=$sku->sku_id;
                $key = implode(';', json_decode($sku->props, true));
                $skus[$key] = json_encode(array('price' => $sku->price, 'stock' => $sku->stock));
            }
            ?>
            <input id="IsShow" type="hidden" value="<?php echo $item->is_show;?>" />
            <div style="display: none;font-size: 50px;font-weight: bold;" id="div_IsShow">商品已下架</div>
            <div class="deal_size" data-sku-key='<?php echo json_encode(array_keys($skus)); ?>'
                 data-sku-value='<?php echo json_encode($skus); ?>' data-sku-id="<?php if(isset($skuId))echo implode(',',$skuId);else echo $item->item_id; ?>">
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
                                        <a href="javascript:void(0)" data-value="<?php echo $v; ?>" id="prop<?php echo str_replace(':','-',$v); ?>">
                                            <img alt="<?php echo $propValue->value_name; ?>"
                                                 src="<?php echo isset($propImgs[$v]) ? $propImgs[$v] : ''; ?>"
                                                 width="41" height="41"></a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0)"
                                           data-value="<?php echo $v; ?>" id="prop<?php echo str_replace(':','-',$v); ?>"><?php echo $propValue->value_name; ?></a>
                                    <?php
                                    }
                                }
                            } else {
                                $ids = explode(':', $pvid);
                                $propValue = $propValues[$ids[1]];
                                if ($itemProp->is_color_prop && false) {
                                    ?>
                                    <a href="javascript:void(0)" data-value="<?php echo $pvid; ?>" id="prop<?php echo str_replace(':','-',$v); ?>">
                                        <img alt="<?php echo $propValue->value_name; ?>"
                                             src="<?php echo isset($propImgs[$pvid]) ? $propImgs[$pvid] : ''; ?>"
                                             width="41" height="41"></a>
                                <?php } else { ?>
                                    <a href="javascript:void(0)"
                                       data-value="<?php echo $pvid; ?>" id="prop<?php echo str_replace(':','-',$v); ?>"><?php echo $propValue->value_name; ?></a>
                                <?php
                                }
                            } ?>
                        </p>
                    <?php
                    }
                } ?>
            </div>
            <div class="deal_num" style="height: 30px">
                <span style="margin-left: 6px">我要买</span>
                <a href="javascript:void(0)" class="minus"><span class="glyphicon glyphicon-minus-sign btn-reduce pull-left"></span></a>
                    <input  id="qty" name="qty" value="<?php echo $item->min_number; ?>"style="width:30px; text-align:center; float:left;"  />
                 <a href="javascript:void(0)" class="add pull-left"><span class="glyphicon glyphicon-plus-sign btn-add " style="margin-left: 5px" ></span></a>
                <span style="float:left">（库存剩余 <label id="stock"><?php echo $item->stock; ?></label> 台)</span>
            </div>
            <?php
            $dealcount = intval($item->stock);
            ?>
            <input type="hidden" id="item_id" name="item_id" value="<?php echo $item->item_id; ?>" />
            <input type="hidden" id="props" name="props" value="" />
            <div  class="deal_add_car" data-url="<?php echo Yii::app()->createUrl('cart/add'); ?>"><a href="javascript:void(0)" id="addToShopCart" >加入购物车</a></div>
            <div class="deal_add" data-url="<?php echo Yii::app()->createUrl('user/user/isLogin'); ?>" ><?php echo CHtml::link("立即购买", 'javascript:void(0);')?></div>
            <div  class="deal_collect" data-url="<?php echo Yii::app()->createUrl('member/wishlist/addWish'); ?>" ><a href="javascript:void(0)">立即收藏</a></div>
            <!-- Modal -->
            <div tabindex="-1" class="modal fade in" id="myModal" role="dialog" aria-hidden="false" aria-labelledby="myModalLabel" style="display: none;">
                <div class="modal-dialog">
                    <div class="modal-content" >

                        <form role="form" id="log-out-box">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="log-out-close">×</button>
                            <div id="warning-load" >
                                <div id="logo"><?php echo Yii::app()->name ?></div>

                                <div class="user">
                                    <div> 用户名：</div>
                                    <input class="txt form-control" id="user" name="user" type="text" placeholder="请输入用户名"/>
                                </div>
                                <div id="ajax"></div>
                                <div class="user">
                                    <div> 密码：</div>
                                    <input class="txt form-control" id="password" name="password" type="password" placeholder="请输入密码"/>
                                </div>
                                <button id="log-btn-div"  name="button" type="button"  class="btn-success btn">登录</button>
                                <div id="register">
                                    <a href="<?php echo Yii::app()->createUrl('user/registration'); ?>" class="link"><u>免费注册</u></a>
                                    <a href="javascript:void" class="link buy-without-login" id="buy-without-login" ><u>免登陆直接购买</u></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<!-- Modal -->
<div tabindex="-1" class="modal fade in" id="myModal-1" role="dialog" aria-hidden="false" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content clearfix" style="width:200px;height:150px;border:1px solid black;padding:10px 10px;" id="myModal-2-content">
            <s id="mymodal-1-png" class="pull-left"></s> <span class="pull-left">成功加入购物车！</span>

            <button class="close pull-right" aria-hidden="true" data-dismiss="modal" type="button"></button>
            <button class="btn btn-success center-block" aria-hidden="true" data-dismiss="modal">确定</button>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- Modal -->
<div tabindex="-1" class="modal fade in" id="myModal-2" role="dialog" aria-hidden="false" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content" style="width:560px;height:310px;border:1px solid black;padding:20px 20px;" id="myModal-1-content">
            <div class="clearfix">
                <s id="mymodal-1-png" class="pull-left"></s> <span class="pull-left">成功加入收藏夹！</span>
                <button class="close pull-right" aria-hidden="true" data-dismiss="modal" type="button"></button>
                </br>
            </div>
            <div width="100%" id="look-collect"> 你可以<a href="/member/wishlist/admin"><font color="#3388BB" src="/member/wishlist/admin">查看收藏夹</font></a></div>
            <hr />
            <div class="col-xs-6 pull-left" align="left">收藏此商品的人还喜欢</div>
            <div class="col-xs-6 pull-right" align="right" style="visibility: hidden"><a><font color="#3388BB">换一组</font></a></div>
<!--            <div>-->
<!--                <ul class="clearfix">-->
<!--                    <li class="col-xs-2">-->
<!--                        <a href="/basic/item/57" title=""target="_blank"><img src="/basic/upload/item/manclothes/.tmb/thumb_d_adaptiveResize_70_70.jpg" class="li-img" alt=""></a>-->
<!--                        <div width="100%" align="center" height="15px">$1299.00</div>-->
<!--                    </li>-->
<!--                    <li class="col-xs-2">-->
<!--                        <a href="/basic/item/59" title=""target="_blank"><img src="/basic/upload/item/manclothes/.tmb/thumb_iii_adaptiveResize_70_70.jpg" alt=""></a>-->
<!--                        <div width="100%" align="center" height="15px">$1299.00</div>-->
<!--                    </li>-->
<!--                    <li class="col-xs-2">-->
<!--                        <a href="/basic/item/35" title=""target="_blank"><img src="/basic/upload/item/manclothes/.tmb/thumb_T1vyPGFhxeXXXXXXXX_!!0-item_pic.jpg_460x460q90_adaptiveResize_70_70.jpg" class="li-img" alt=""></a>-->
<!--                        <div width="100%" align="center" height="15px">$1299.00</div>-->
<!--                    </li>-->
<!--                    <li class="col-xs-2">-->
<!--                        <a href="/basic/item/37" title=""target="_blank"><img src="/basic/upload/item/manclothes/.tmb/thumb_1015622205-1_u_1_adaptiveResize_70_70.jpg" class="li-img" alt=""></a>-->
<!--                        <div width="100%" align="center" height="15px">$1299.00</div>-->
<!--                    </li>-->
<!--                    <li class="col-xs-2">-->
<!--                        <a href="/basic/item/58" title=""target="_blank"><img src="/basic/upload/item/manclothes/.tmb/thumb_f_adaptiveResize_70_70.jpg" class="li-img" alt=""></a>-->
<!--                        <div width="100%" align="center" height="15px">$1299.00</div>-->
<!--                    </li>-->
<!--                    <li class="col-xs-2">-->
<!--                        <a href="/basic/item/31" title=""target="_blank"><img src="/basic/upload/item/manclothes/.tmb/thumb_01_adaptiveResize_70_70.jpg" class="li-img" alt=""></a>-->
<!--                        <div width="100%" align="center" height="15px">$1299.00</div>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->

            <div>
                <ul class="clearfix">
                    <?php
                    $recommendItems=Item::model()->findAll(array(
                        'condition'=>'category_id='.$item->category_id,
                        'limit'=>6,
                    ));
                    $num=count(recommendItems);
                    if($num>0){
                        foreach($recommendItems as $value){
                            if($value->getMainPic()){
                                $picUrl=$imageHelper->thumb('70','70',$value->getMainPic());
                                $picUrl=Yii::app()->baseUrl.$picUrl;
                            }else $picUrl=$item->getHolderJs('70','70');
                            ?>
                            <li class="col-xs-2">
                                <a href=""><img class="li-img" alt="" src="<?php echo $picUrl?>" width="70" height="70"/></a>
                                <div width="100%" align="center" height="15px"><?php echo $value->price?></div>
                            </li>
                        <?php
                        }
                    }else echo"No data";
                    ?>

                </ul>
            </div>

            <button class="btn btn-success center-block" aria-hidden="true" data-dismiss="modal">确定</button>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div tabindex="-1" class="modal fade in" id="myModal-3" role="dialog" aria-hidden="false" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content clearfix" style="width:200px;height:150px;border:1px solid black;padding:10px 10px;" id="myModal-2-content">
            <s id="mymodal-1-png" class="pull-left"></s> <span class="pull-left">您已收藏过该产品！</span>

            <button class="close pull-right" aria-hidden="true" data-dismiss="modal" type="button"></button>
            <button class="btn btn-success center-block" aria-hidden="true" data-dismiss="modal">确定</button>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<div class="container" style="padding-top:20px">
    <div class="col-lg-3">
        <div class="pd_l_nv">
            <div class="pd_l_ti">
                <a href="<?php echo Yii::app()->baseUrl.'/'; ?>">首页>></a>
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
        <div class="pd_l_intr">
            <h2>推荐产品</h2>
            <ul class="pd_intr_list">
                <?php
                $recommendItems=Item::model()->best()->findAll(array(
                    'limit'=>3,
                ));
                $num=count(recommendItems);
                if($num>0){
                    foreach($recommendItems as $value){
                        if($value->getMainPic()){
                            $picUrl=$imageHelper->thumb('180','180',$value->getMainPic());
                            $picUrl=Yii::app()->baseUrl.$picUrl;
                        }else $picUrl=$item->getHolderJs('180','180');
                        ?>
                        <li>
                            <div class="intr_list_img"><a href=""><img alt="" src="<?php echo $picUrl?>" width="180" height="180"/></a></div>
                            <div class="intr_list_tit"><a href=""><?php echo $value->getTitle()?></a></div>
                            <div class="intr_list_price"><span class="cor_red bold"><?php echo $value->price?></span></div>
                        </li>
                    <?php
                    }
                }else echo"No data";
                ?>

            </ul>
        </div>
    </div>
    <div class="col-lg-9">
        <ul class="deal_describe_tit">
            <li onclick="describe(1);" class="current">商品描述</li>
            <li onclick="describe(2);">顾客评价（<span class="cor_red"><?php echo $item->review_count;?></span>）</li>
            <li onclick="describe(3);">月成交记录（<span class="cor_red"><?php echo $item->deal_count;?></span>）</li>
        </ul>
        <div class="deal_describe" id="describe_1" style="">
            <?php echo $item->desc; ?>
        </div>
        <div class="deal_describe" id="describe_2" style="display:none;">
            <?php    $this->widget('widgets.default.WReview',array(
                '_itemId'=> $item->item_id,
                '_entityId'=>'1',
            ))?>
        </div>

        <div class="deal_describe" id="describe_3" style="display:none;">
            <?php
            $num=count($item->orderItems);
            if($num>0){
                ?>
                <table class="table table-bordered table-hover table-striped" >
                    <colgroup>
                        <col class="col-user">
                        <col class="col-title">
                        <col class="col-price">
                        <col class="col-quantity">
                        <col class="col-time">
                        <col class="col-status">
                    </colgroup>
                    <thead id="table-th">
                    <tr>
                        <th>买家</th>
                        <th>宝贝名称</th>
                        <th>价格</th>
                        <th>购买数量</th>
                        <th>成交时间</th>
                        <th>状态</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                    foreach($item->orderItems as $orderItem) {
                        /** @var OrderItem $orderItem */
                        ?>
                        <tr>
                            <td><?php echo Tbfunction::getUser($orderItem->order->user_id);?></td>
                            <td><?php echo $orderItem->title;?></td>
                            <td><?php echo $orderItem->price;?></td>
                            <td><?php echo $orderItem->quantity;?></td>
                            <td><?php echo date("M j, Y",$orderItem->order->create_time);?></td>
                            <td><?php echo $orderItem->order->status? finished:unfinished;?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                </table>
            <?php
            }
            else echo "No data";
            ?>




        </div>
    </div>
</div>

<script type="text/javascript">
$(function () {
    if($('#IsShow').val()==0||$('#stock').text()==0) {
        $('.deal_size,.deal_num,.deal_add,.deal_add_car,.deal_collect').hide();
        $('#div_IsShow').toggle();
    }
    var skus = $('.deal_size').data('sku-value');
    var emptySkus = [];
    var emptySkusArray=new Array();
    for (var i in skus) {
        var sku = $.parseJSON(skus[i]);
        if (sku['stock'] == "0") {
            emptySkus.push(i);
        }
    }
    if(emptySkus.length>0){
        for(var a in emptySkus){
            var data=emptySkus[a].split(';');
            emptySkusArray[a]=new Array();
            for( var b in data){
                emptySkusArray[a][b]=data[b];
            }
        }
    }
    /**立即购买**/
    function findSkuId(selectPropValue){
        var select = $('.deal_size');
        var skuKey = select.data('sku-key');
        for(var a in skuKey){
            if(skuKey[a]==selectPropValue){
                var num=a;
            }
        }
        var skuKeyId=select.data('sku-id').split(',');
        var selectAdd=$('.deal_add');
        selectAdd.find('a').attr({
            'data-url':selectAdd.data('url')+"?position=Sku"+skuKeyId[num]
        });
    }
//        $('.deal_add').click(function(){
//            var selectProps = $('.prop-select,.img-prop-select');
//            if (selectProps.length < $('.deal_size p').length) {
//                $('.deal_size').addClass('prop-div-select');
//            } else {
//                $.post($('.deal_add_car').data('url'), $('#deal').serialize(), function(response) {
//                    if(response.status=='success'){
//                        location.href=$('.deal_add a').data('url');
//                    }else{
//                        showPopup('system error');
//                    }
//                },'json');
//            }
//        })
    function findSameValue(a,b){
        var num1= a.length;
        var num2= b.length;
        var flag=0;
        if(num2-num1==0){
            for(var c in a){
                if(a[c]==b[c]&&flag==c){
                    flag++;
                }
            }if(flag==num1-1){
                return true;
            }
        }
        if(num2-num1==1){
            for(var c in a){
                if(a[c]==b[c]){
                    flag++;
                }
            }
        }
        if(flag==num1){
            return true;
        }else return false;
    }
    $('.deal_size a').click(function () {
        var selectClass = $(this).find('img').length ? 'img-prop-select' : 'prop-select';
        if($(this).attr('class') !='disable'){
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
            /***将库存为0的选项加上disable属性****/
            if(emptySkus.length>0){
                var disableRemoveFlag=true;
                for(var b in emptySkusArray){
                    if(findSameValue(selectPropValue,emptySkusArray[b])){
                        var selectDisable=$("#prop"+emptySkusArray[b][emptySkusArray[b].length-1].replace(/:/,'-'));
                        selectDisable.addClass('disable');
                        selectDisable .removeClass( 'prop-select');
                        disableRemoveFlag=false;
                    }
                    if(disableRemoveFlag){
                        while($('.disable').length){
                            $('.disable').removeClass('disable');
                        }
                    }
                }
            }
            selectPropValue = selectPropValue.join(';');
            $('#props').val(selectPropValue);
            if (skus[selectPropValue]) {
                findSkuId(selectPropValue);
                var sku = $.parseJSON(skus[selectPropValue]);
                var price = $('.deal_price').find('span:eq(0)');
                price.text(price.text().substr(0, 1) + sku['price']);
                var price = $('.deal_price').find('strong');
                price.text(price.text().substr(0, 1) + sku['price']);
                $('#stock').text(sku['stock']);
            }
            if($('.deal_size').data('sku-value').length==0){
                var selectAdd=$('.deal_add');
                selectAdd.find('a').attr({
                    'data-url':selectAdd.data('url')+"?position=Item"+$('.deal_size').data('sku-id')
                })
            }
        }
    });
    $('.add').click(function () {
        $('#num').text(parseInt($('#num').text()) + 1);
        $('#qty').val(parseInt($('#qty').val()) + 1);
        var  num = $('input[name = qty]').val();
         var i = <?=$dealcount?>;
          if(num >i ){
            alert('商品数量不能大于库存！');
            $('#num').text(parseInt($('#num').text()) - 1);
            $('#qty').val(parseInt($('#qty').val()) - 1);
        }
    });
    $('#qty').keyup(function () {
        var  num = $('input[name = qty]').val();
        var  i = <?=$dealcount?>;
        if(num >i){
            alert('商品数量不能大于库存！');
            $('#qty').val(parseInt($('#qty').val())-parseInt($('#qty').val())+1);
        }
    })
    $('.minus').click(function () {
        $('#num').text(parseInt($('#num').text()) - 1);
        $('#qty').val(parseInt($('#qty').val()) - 1);
        var num = $('input[name = qty]').val();
        if(num < 1){
            alert('商品数量不能为负！');
            $('#num').text(parseInt($('#num').text()) + 1);
            $('#qty').val(parseInt($('#qty').val()) + 1);
        }
    });
    $('.deal_add_car').click(function() {
        $("#log-btn-div").click(function() {carLogin();});
        $("#buy-without-login").hide();
        var selectProps = $('.prop-select,.img-prop-select');
        if (selectProps.length < $('.deal_size p').length) {
            showPopup("请添加商品规格。");
            $('.deal_size').addClass('prop-div-select');
        } else {
            $('.deal_size').removeClass('prop-div-select');
            $.post($(".deal_add").data('url'), function(response){
                if (response.status == 'login') {
                    $.post($('.deal_add_car').data('url'), $('#deal').serialize(), function(response) {
                        if(response.status=='success'){
//                            var num=$('.shopping_car').children().text();
//                            num=parseInt(num)+1;
                            $('.shopping_car').children().text(response.number);
                            $("#myModal-1").modal('show');
                        }else
                            showPopup(response.status);
                    },'json');
                } else {
                    $('#myModal').modal('show');
                }
            }, 'json');
        }
    });
    $('.deal_collect').click(function() {
        $("#log-btn-div").click(function() {collectLogin();});
        $("#buy-without-login").hide();
        $.post($(".deal_add").data('url'), function(response){
            if (response.status == 'login') {
                $.post($(".deal_collect").data('url'),$('#item_id').serialize(),function(response){
                    if(response.status=='exist'){
                        $("#myModal-3").modal('show');
                    }else
                        $("#myModal-2").modal('show');
                },'json');
            } else {
                $('#myModal').modal('show');
            }
        }, 'json');

//        $.post($(this).data('url'), $('#item_id').serialize(), function(response) {
//            if(response.status=='exist'){
//                $("#myModal-3").modal('show');
//            }else
//                $("#myModal-2").modal('show');
//        },'json');
    });
    $('.deal_add').click(function() {
        $("#log-btn-div").click(function() {llogin();});
        $("#buy-without-login").show();
        var selectProps = $('.prop-select,.img-prop-select');
        if (selectProps.length < $('.deal_size p').length) {
            $('.deal_size').addClass('prop-div-select');
        } else {
            $('.deal_size').removeClass('prop-div-select');
//                $('#deal').submit();
            $.post($(this).data('url'), function(response){
                if (response.status == 'login') {
                    $('#deal').submit();
                } else {
//                     $('#loginPage')
                    $('#myModal').modal('show');
                }
            }, 'json');
        }
    });


    $('.buy-without-login').click(function() {
        $('#deal').submit();
    });
});

function collectLogin() {
    var data = { username: $("#user").val(), password: $("#password").val() };
    $.post("../user/login/llogin",data , function(response) {
        if (response.status == 'login') {
            $('#top_right').load(location.href+" #top_right");
            $('#myModal').modal('hide');
            $('.deal_collect').trigger('click');
        } else {
            alert("Wrong username or password!");
        }
    }, 'json');
}

function carLogin() {
    var data = { username: $("#user").val(), password: $("#password").val() };
    $.post("../user/login/llogin",data , function(response) {
        if (response.status == 'login') {
            $('#top_right').load(location.href+" #top_right");
            $('#myModal').modal('hide');
            $('.deal_add_car').trigger('click');
        } else {
            alert("Wrong username or password!");
        }
    }, 'json');
}

var xmlHttp
//    function test() {
//        window.open("http://yincart/user/login/test?username="+$("#user").val()+"&password="+$("#password").val());
//    }
function llogin() {
    xmlHttp=GetXmlHttpObject();
    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return
    }

    var url= "../user/login/llogin";
    var data = { username: $("#user").val(), password: $("#password").val() };
    url=url+"?username="+$("#user").val();
    url=url+"&password="+$("#password").val();
    xmlHttp.onreadystatechange=stateChanged(url);
//        xmlHttp.open("POST",url,true);
//        xmlHttp.send();
}

function stateChanged(url)
{
    var xmlHttp
    //    function test() {
    //        window.open("http://yincart/user/login/test?username="+$("#user").val()+"&password="+$("#password").val());
    //    }
    function llogin() {
        xmlHttp=GetXmlHttpObject();
        if (xmlHttp==null)
        {
            alert ("Browser does not support HTTP Request")
            return
        }

        var url= "http://yincart/user/login/llogin";
//        var data = { username: $("#user").val(), password: $("#password").val() };
        url=url+"?username="+$("#user").val();
        url=url+"&password="+$("#password").val();
        xmlHttp.onreadystatechange=stateChanged(url);
//        xmlHttp.open("POST",url,true);
//        xmlHttp.send();
    }

    function stateChanged(url)
    {
        $.post(url, function(response){
            if (response.status == 'login') {
                $('#deal').submit();
            } else {
                alert("Wrong username or password!");
            }
        }, 'json');

//            document.getElementById("user").innerHTML=xmlHttp.responseText;
        //$("#myModal").css("display","none");
        //      }
    }

    function GetXmlHttpObject()
    {
        var xmlHttp=null;

        try
        {
            // Firefox, Opera 8.0+, Safari
            xmlHttp=new XMLHttpRequest();
        }
        catch (e)
        {
            // Internet Explorer
            try
            {
                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e)
            {
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        return xmlHttp;
    }
    $.post(url, function(response){

        if (response.status == 'login') {
            $('#deal').submit();
        } else {
            alert("用户名或密码错误!");
        }
    }, 'json');

//            document.getElementById("user").innerHTML=xmlHttp.responseText;
    //$("#myModal").css("display","none");
    //      }
}

function GetXmlHttpObject()
{
    var xmlHttp=null;

    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}
</script>
