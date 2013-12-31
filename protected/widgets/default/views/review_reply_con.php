<div id="reply" reply-id="<?php print_r($review_id);?>">
<div class="reply-list">
    <div class="reply-wrap">
        <p><em>回复:&nbsp</em><span class="u-name"><?php print_r($username);?> </span></p>
        <div class="reply-input">
            <div class="fl">
                <input type="text"   replyId="<?php print_r($review_id);?>" url="<?php echo Yii::app()->baseUrl?>">
            </div>
            <a href="#none" class="btn-reply-customer"  data-replyid="<?php print_r($review_id);?>">&nbsp&nbsp回复</a>
            <div class="clr">
            </div>
        </div>
    </div>
</div>
<?php
$review=Review::model()->reviewFind($review_id,Review::ENTITY_REVIEW,'');
$reviewDatas=$review[0];
$reviewCount=count($reviewDatas);
$pages=$review[1];
if($reviewCount>0){
    foreach($reviewDatas as $reviewData){
        if(isset($reviewData->content)){?>
        <div class="item-reply" style="display: block;">
    <div class="reply-list">
        <div class="reply-con">
            <span class="u-name"><a><?php
                $customer = User::model()->find(array(
                    'select' => 'username',
                    'condition' => 'id=?',
                    'params' => array($reviewData->customer_id)
                ));
                print_r($customer['username']);?>

                </a>  :
            </span>
            <span class="u-con"><?php  print_r($reviewData->content);?></span>
            <div class="reply-meta">
                <span class="reply-left f1"> <?php echo date('Y-m-d   H:i:s',$reviewData->create_at); ?></span>
            </div>
        </div>
    </div>
        </div>
<?php
        }
    }
    if($num>5){
        echo "<div class='ac' style='text-align:center'>";
        echo CHtml::link("查看更多",'../review/default/reviewDetail?reviewId='.$review_id);
        echo "</div>";
    }

}
?>
</div>
