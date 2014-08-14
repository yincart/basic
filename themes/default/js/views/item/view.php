 <?php $cs = Yii::app()->clientScript;
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/product.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/deal.css');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/pptBox.js');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/lrtk.js');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/lrtk.js');
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl.'/css/cart/review.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/review.js');
Yii::app()->clientScript->registerCoreScript('jquery');
//Yii::app()->bootstrap->register();

$imageHelper=new ImageHelper();
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
            <a href="/basic/page/contact?key=help">联系<br/>在线客服</a>
        </div>
    </div>
    <div class="deal container_24">
        <div class="deal_tip">
            <a href="<?php echo Yii::app()->baseUrl.'/'; ?>">首页>></a>
            <?php foreach ($this->breadcrumbs as $breadcrumb) {
                echo '<a href="' . $breadcrumb['url'] . '">' . $breadcrumb['name'] . '</a>';
            } ?>
        </div>
        <div class="deal_pic">
            <div>
                <ul id="idNum" class="hdnum">
                    <?php foreach ($item->itemImgs as $itemImg) {
                        if(!empty($itemImg->pic)){
                            $picUrl=$imageHelper->thumb('70','70',$itemImg->pic);
                            $picUrl=yii::app()->baseUrl. $picUrl;
                        }else $picUrl=$item->getHolderJs('70','70');
                         echo '<li><img src="' .$picUrl . '" width="70" height="70"></li>';
                    } ?>
                </ul>
            </div>
            <div style="width: 450px; height: 450px; overflow: hidden; position: relative;" id="idTransformView" class="idtransformview">
                <ul id="idSlider" class="slider">
                    <?php foreach ($item->itemImgs as $itemImg) {
                        if($itemImg->pic){
                            $picUrl=$imageHelper->thumb('450','450',$itemImg->pic);
                            $picUrl=yii::app()->baseUrl. $picUrl;
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
                <span class="cor_gray">市场价：<strong><?php echo $item->currency . $item->price ?></strong></span>
            </div>
            <div class="deal_sold">已售出 <span class="cor_red bold">30</span>&nbsp;件</div>
            <?php
            $skus = array();
            foreach ($item->skus as $sku) {

                $skuId[]=$sku->sku_id;
                $key = implode(';', json_decode($sku->props, true));
                $skus[$key] = json_encode(array('price' => $sku->price, 'stock' => $sku->stock));
            }
            ?>
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
            <div class="deal_num">
                <span>我要买</span><span class="deal_num_c">
                    <a href="javascript:void(0)" class="minus"></a>
                    <label class="qty_num" id="num"><?php echo $item->min_number; ?></label>
                    <input type="hidden" id="qty" name="qty" value="<?php echo $item->min_number; ?>" />
                    <a href="javascript:void(0)" class="add"></a></span>
                <span>(库存剩余 <label id="stock"><?php echo $item->stock; ?></label>台)</span>
            </div>
            <input type="hidden" id="item_id" name="item_id" value="<?php echo $item->item_id; ?>" />
            <input type="hidden" id="props" name="props" value="" />
            <div class="deal_add_car" data-url="<?php echo Yii::app()->createUrl('cart/add'); ?>"><a href="javascript:void(0)">加入购物车</a></div>
            <div class="deal_add"><?php echo CHtml::link("立即购买", 'javascript:void(0);')?></div>
            <div class="deal_collect" data-url="<?php echo Yii::app()->createUrl('member/wishlist/addWish'); ?>" ><a href="javascript:void(0)">立即收藏</a></div>
     </form>
    </div>
    <div class="pd_l container_24">
        <div class="pd_l_fl grid_5">
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
        <div class="pd_l_fr grid_19">
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
                    $dataprovider=new CActiveDataProvider('OrderItem',array(
                        'criteria'=>array(
                           'condition'=>'item_id='.$item->item_id,
                        ),
                        'pagination'=>array(
                            'pageSize'=>10,
                        ),
                    ));
                    $this->widget('zii.widgets.grid.CGridView',array(
                        'dataProvider' =>$dataprovider,
                        'columns' => array(
                            array(
                                'name'=>'user',
                                'value'=>'Tbfunction::getUser($data->order->user_id)',
                            ),
                            'title',
                            'price',
                            'quantity',
                            array(
                                'name'=>'time',
                                'value'=>'date("M j, Y",$data->order->create_time)',
                            ),
                            array(
                                'name'=>'status',
                                'value'=>'$data->order->status?finished:unfinished',
                            ),
                        )
                    ));
                }
               else echo "No data";
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
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
        });
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
            var selectProps = $('.prop-select,.img-prop-select');
            if (selectProps.length < $('.deal_size p').length) {
                $('.deal_size').addClass('prop-div-select');
            } else {
                $('.deal_size').removeClass('prop-div-select');
                $.post($(this).data('url'), $('#deal').serialize(), function(response) {
                        if(response.status=='success'){
                            var num=$('.shopping_car').children().text();
                            num=parseInt(num)+1;
                            $('.shopping_car').children().text(num);
                            showPopup(response.status);
                        }else
                            showPopup(response.status);
                },'json');
            }
        });
        $('.deal_collect').click(function() {
                $.post($(this).data('url'), $('#item_id').serialize(), function(response) {
                    if(response.status=='exist'){
                        showPopup('已收藏过该商品');
                    }else
                        showPopup(response.status) ;
                },'json');

        });
        $('.deal_add').click(function() {
            var selectProps = $('.prop-select,.img-prop-select');
            if (selectProps.length < $('.deal_size p').length) {
                $('.deal_size').addClass('prop-div-select');
            } else {
                $('.deal_size').removeClass('prop-div-select');
                $(this).parents('form').submit();
            }
        });
    });
</script>
