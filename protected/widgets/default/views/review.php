<?php
/**
 * Created by cangzhou.
 * email:wucangzhou@gmail.com
 * Date: 12/17/13
 * Time: 2:47 PM
 */

    Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/themes/default/css/review.css');
    Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/themes/default/js/review.js');
    Yii::app()->clientScript->registerCoreScript('jquery');

?>
<div id="review">
    <?php
    $review=$this->reviewData();
    $reviewData=$review[0];
    $reviewCount=count($reviewData);
    $pages=$review[1];
    $reviewNum=Review::model()->reviewSummary($this->_itemId,$this->_entityId,'1');
    $picReviewCount= Review::model()->reviewSummary($this->_itemId,$this->_entityId,'2');


    $this->renderPartial('/review_head',array('product_id'=>$this->_itemId,'entity'=>$this->_entityId, 'ReviewNum'=>$reviewNum,'picReviewCount'=>$picReviewCount));
    echo '<div class="tb-revbd">';
    echo '    <ul>';
    if ($reviewCount >= 1) {
        $i=0;
        foreach ($reviewData as $reviewData) {
            $this->renderPartial('/review_con',array(
                'reviewData'=>$reviewData,
            ));
        }echo"<div class='linkPage'>";
            $this->widget('CLinkPager',array('pages'=>$pages));
        echo '</div>';
    }else echo "暂无数据";
    ?>
    </ul>
</div>
</div>