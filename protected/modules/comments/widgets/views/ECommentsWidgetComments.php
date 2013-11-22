<?php if(count($comments) > 0):?>
    <ul class="comments-list">
        <?php foreach($comments as $comment):?>
            <li id="comment-<?php echo $comment->comment_id; ?>">
                <div class="comment-header">
                    <?php echo $comment->userName;?>
                    <?php echo Yii::app()->dateFormatter->formatDateTime($comment->create_time);?>
                </div>
                <?php if($this->adminMode === true):?>
                    <div class="admin-panel">
                        <?php if($comment->status === null || $comment->status == Comment::STATUS_NOT_APPROWED) echo CHtml::link(Yii::t('CommentsModule.msg', 'approve'), Yii::app()->urlManager->createUrl(
                            CommentsModule::APPROVE_ACTION_ROUTE, array('id'=>$comment->comment_id)
                        ), array('class'=>'approve'));?>
                        <?php echo CHtml::link(Yii::t('CommentsModule.msg', 'delete'), Yii::app()->urlManager->createUrl(
                            CommentsModule::DELETE_ACTION_ROUTE, array('id'=>$comment->comment_id)
                        ), array('class'=>'delete'));?>
                    </div>
                <?php endif; ?>
                <div>
                    <?php echo CHtml::encode($comment->comment_text);?>
                </div>
                <?php if(count($comment->childs) > 0 && $this->allowSubcommenting === true) $this->render('ECommentsWidgetComments', array('comments' => $comment->childs));?>
                <?php
                    if($this->allowSubcommenting === true && ($this->registeredOnly === false || Yii::app()->user->isGuest === false))
                    {
                        echo CHtml::link(Yii::t('CommentsModule.msg', 'Add comment'), '#', array('rel'=>$comment->comment_id, 'class'=>'add-comment'));
                    }
                ?>
            </li>
        <?php endforeach;?>
    </ul>
<?php else:?>
    <p><?php echo Yii::t('CommentsModule.msg', 'No comments');?></p>
<?php endif; ?>

