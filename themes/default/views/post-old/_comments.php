
<ul><?php foreach($comments as $comment): ?>
<li class="comment" id="c<?php echo $comment->id; ?>" style="border-bottom: 1px dashed darkgray;margin:10px ">

	<?php echo CHtml::link("<?php echo $comment->authorLink; ?>", $comment->getUrl($post), array(
		'class'=>'cid',
		'title'=>'Permalink to this comment',
	)); ?>

<!--	<div class="author">-->
<!--		--><?php //echo $comment->authorLink; ?><!-- :-->
<!--	</div>-->
<!--	<div class="content">-->
<!--		评论内容：--><?php //echo nl2br(CHtml::encode($comment->content)); ?>
<!--	</div>-->
<!--    <div class="time">-->
<!--       发表于： --><?php //echo date('F j, Y \a\t h:i a',$comment->create_time); ?>
<!--    </div>-->



        <span><b style="color: #26709A"><?php echo $comment->authorLink; ?>:</b></span> <br/>
        &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp;
        <small style="color:#9B9B9B">发表时间： <?php echo date('F j, Y \a\t h:i a',$comment->create_time); ?> 第<span><?php echo $comment->id; ?></span>楼</small><br/>

        <p class="mainTxt"style="margin-left: 30px">  <?php echo nl2br(CHtml::encode($comment->content)); ?></p>



</li><!-- comment --><?php endforeach; ?>
    </ul>
