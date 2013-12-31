<div class="tb-r-filter">
    <ul class="tb-taglist">
        <li class="tb-long">
            <label for="reviews-t-1">
                <span class="r-c-title"><?php echo CHtml::ajaxLink('全部',array('/review/default/index','product_id'=>$product_id,'entity_id'=>$entity),array('success'=>'function(data){var wrap=$("<code></code>").append($(data));var table=$(".tb-revbd",wrap).html();$(".tb-revbd").html(table)}'));?></span>
            </label>
        </li>
        <li class="tb-long">
            <label for="reviews-t-2">
                <span class="r-c-title"><?php echo CHtml::ajaxLink('好评',array('/review/default/index','product_id'=>$product_id,'entity_id'=>$entity,'rating'=>1),array('success'=>'function(data){var wrap=$("<code></code>").append($(data));var table=$(".tb-revbd",wrap).html();$(".tb-revbd").html(table)}'));?>(<?php echo $ReviewNum[1] ?>)</span>
            </label>
        </li>
        <li class="tb-long">
            <labelfor
            ="reviews-t-3">
            <span class="r-c-title"><?php echo CHtml::ajaxLink('中评',array('/review/default/index','product_id'=>$product_id,'entity_id'=>$entity,'rating'=>2),array('success'=>'function(data){var wrap=$("<code></code>").append($(data));var table=$(".tb-revbd",wrap).html();$(".tb-revbd").html(table)}'));?>(<?php echo $ReviewNum[2] ?>)</span>
            </label>
        </li>
        <li class="tb-long">
            <label for="reviews-t-4"><span class="r-c-title"><?php echo CHtml::ajaxLink('差评',array('/review/default/index','product_id'=>$product_id,'entity_id'=>$entity,'rating'=>3),array('success'=>'function(data){var wrap=$("<code></code>").append($(data));var table=$(".tb-revbd",wrap).html();$(".tb-revbd").html(table)}'));?>(<?php echo $ReviewNum[3] ?>)</span>
            </label>
        </li>
        <li class="tb-long">
            <label for="reviews-t-6">
                <i class="tb-icon-pic"></i><span class="r-c-title"><?php echo CHtml::ajaxLink('图片',array('/review/default/index','product_id'=>$product_id,'entity_id'=>$entity,'rating'=>4),array('success'=>'function(data){var wrap=$("<code></code>").append($(data));var table=$(".tb-revbd",wrap).html();$(".tb-revbd").html(table)}'));?>(<?php echo $picReviewCount ?>)</span>
            </label>
        </li>
    </ul>
</div>