<script type="text/javascript">
    //    $(document).ready(function() {
    //         $(".ks-none").click(function (event) {
    //             $(".ks-none").css("display:none");
    //             $(".shop_xf shop_right J_TBox").hide();
    //         })
    //    })
</script>
<div style="width:120px;right:7px;top:170px;"  class="shop_xf shop_right J_TBox">
    <div class="J_TWidget" style="visibility:visible;">
        <ul class="nav ks-switchable-nav">
            <li class="selected"><img src="http://img02.taobaocdn.com/bao/uploaded/i2/T1sQG6Xi4iXXb1upjX.jpg?noq=y&amp;rid=37631133&amp;file_path=-djzk.jpg"></li>
            <li class="ks-none"></li>
        </ul>
        <div class="ks-switchable-content">
            <div class="bd" style="display: block;">
                <div class="bk time"><h3>在线时间</h3><span>09:00-23:00</span></div>
                <div class="kf bk">
                    <?php
                    $category = Category::model()->findByPk('104');
                    $service_category = $category->children()->findAll();
                    foreach ($service_category as $sc) {
                        ?>
                        <h3><?php echo $sc->name ?></h3>
                        <ul>
                            <?php 
                            $cri = new CDbCriteria(array(
                                'condition' => 'category_id ='.$sc->id
                            ));
                            $CustomerService = CustomerService::model()->findAll($cri);
                            foreach($CustomerService as $cs){
                            ?>
                            <li><span><?php echo $cs->nick_name ?></span>
                                <?php if($cs->type == 1) {?>
                                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $cs->account ?>&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $cs->account ?>:45" alt="点击这里给我发消息" title="点击这里给我发消息"></a>
                                <?php }elseif($cs->type == 2){ ?>
                                <a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $cs->account ?>&siteid=cntaobao&status=2&charset=utf-8"><img border="0" src="http://amos.alicdn.com/realonline.aw?v=2&uid=<?php echo $cs->account ?>&site=cntaobao&s=2&charset=utf-8" alt="点击这里给我发消息" /></a>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
                <div class="bk phonee"><h3>联系电话</h3><span>86 0579 86898388</span></div>
                <div><a target="_blank" class="J_TokenSign" href="#" style="border:none;"><img src="http://img01.taobaocdn.com/bao/uploaded/i1/T16kC6Xj4iXXb1upjX.jpg?noq=y&amp;rid=37631128&amp;file_path=-right_bottom.jpg"></a></div>
                <div style="display:none;" class="f_con2"></div>
            </div>
        </div>
    </div>
</div>