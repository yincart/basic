<?php
Yii::app()->clientScript->registerCssFile(Yii::app()->theme->baseUrl .'/css/cart/review.css');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl .'/js/review.js');
Yii::app()->clientScript->registerCoreScript('jquery');
$reviewDatas=$reviewReply[0];
$pages=$reviewReply[1];
echo "<a style='font-size:20px' href=".Yii::app()->baseUrl."/item/".$_REQUEST['itemId'].">Back to menu</a>"
?>
<div id="review" url="<?php echo Yii::app()->baseUrl?>" >
<li class="tb-r-review">
    <div class="tb-r-buyer">
        <div class="tb-r-b-photo"><img src="#"></div>
        <div class="tb-r-b-user">
            <?php $customer = User::model()->find(array(
                'select' => 'username',
                'condition' => 'id=?',
                'params' => array($review->customer_id)
            ));
            print_r($customer['username']);
            ?>
        </div>
    </div>
    <div class="tb-r-bd">
    <div class="tb-r-cnt">
        <dd>
            <?php print_r($review->content); ?>
        </dd>
    </div>
    <div class="tb-r-photos">
        <?php
        if($reviewData->photos_exit!=0){
            echo "<div class='comment-show-pic'><table cellspacing='10'><tbody><tr>";
            $photos=$review->reviewPhotos;
            $photosNum=count($photos);
            for($a=0;$a<$photosNum;$a++){
                if(isset($photos[$a]->path)){
                    ?>
                    <td><a class="comment-show-pic-wrap">
                            <img src="<?php echo Yii::app()->baseUrl.$photos[$a]->path?>"></a>
                    </td>
                <?php
                }
            }
        }
        ?>
        </tr></tbody></table>
    </div>
    <div class="tb-r-act-bar">
        <dd>
            <?php echo date('Y-m-d   H:i:s',$review->create_at); ?>
        </dd>
    </div>


    <div class="btns">
        <a class="btn-reply" data-id="<?php print_r($review->review_id); ?>" >
            回复(
            <em>
                <?php $num= Review::model()->reviewSummary($review->review_id, Review::ENTITY_REVIEW, '4');echo $num;
                ?>
            </em>
            )
        </a>
    </div>
        <div id="reply" reply-id="<?php print_r($review->review_id);?>" style="display: block">
            <div class="reply-list" reply_list_id="0">
                <div class="reply-wrap">
                    <p><em>回复:&nbsp</em><span class="u-name"><?php print_r($customer['username']);?> </span></p>
                    <div class="reply-input">
                        <div class="fl">
                            <input type="text"   replyId="<?php print_r($review->review_id);?>" url="<?php echo Yii::app()->baseUrl?>">
                        </div>
                        <a href="#none" class="btn-reply-customer"  data-replyid="<?php print_r($review->review_id);?>" reply_list_b_id="0">&nbsp&nbsp回复</a>
                        <div class="clr">
                        </div>
                    </div>
                </div>
            </div>
<?php
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
} $this->widget('CLinkPager',array('pages'=>$pages));
echo "</div>";
echo " </li>";
?>
</div>
