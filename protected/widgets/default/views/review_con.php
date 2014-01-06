<li class="tb-r-review">
    <div class="tb-r-buyer">
        <div class="tb-r-b-photo"><img src="#"></div>
        <div class="tb-r-b-user">
            <?php $customer = User::model()->find(array(
                'select' => 'username',
                'condition' => 'id=?',
                'params' => array($reviewData->customer_id)
            ));
            print_r($customer['username']);
            ?>
        </div>
    </div>
    <div class="tb-r-bd">
        <div class="tb-r-cnt" >
            <dd content-id="<?php echo $i?>">
                <?php print_r($reviewData->content); ?>
            </dd>
        </div>
        <div class="tb-r-photos">
            <?php
            if($reviewData->photos_exit!=0){
                echo "<div class='comment-show-pic'><table cellspacing='10'><tbody><tr>";
                $photos=$reviewData->reviewPhotos;
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
                <?php echo date('Y-m-d   H:i:s',$reviewData->create_at); ?>
            </dd>
        </div>


        <div class="btns">
            <a class="btn-reply" style="cursor:pointer;" data-id="<?php print_r($reviewData->review_id); ?>" >
                reply(<em>
                    <?php $num= Review::model()->reviewSummary($reviewData->review_id, Review::ENTITY_REVIEW, '4');echo $num;
                    ?>
                </em>)
            </a>
        </div>
<?php
$this->renderPartial('/review_reply_con',array(
    'review_id'=>$reviewData->review_id,
    'itemId'=>$itemId,
    'username'=>$customer['username'],
    'num'=>$num,
    'i'=>$i,
));
echo "</div>";
echo " </li>";
?>