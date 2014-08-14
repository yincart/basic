<div class="row">
        <div class="span12">
            <div>
                <?php echo CHtml::link($model->title, array('/video/view', 'id'=>$model->id)) ?>
            </div>
            <div>
                作者：<?php echo $model->author ?> 发布时间：<?php echo F::date($model->create_time) ?> 热度：<?php echo $model->views ?>
            </div>
            <div>
                <object width="800" height="600"
                        type="video/x-ms-asf" url="<?php echo $model->url ?>" data="<?php echo $model->url ?>"
                        classid="CLSID:6BF52A52-394A-11d3-B153-00C04F79FAA6">
                    <param name="url" value="<?php echo $model->url ?>">
                    <param name="filename" value="<?php echo $model->url ?>">
                    <param name="autostart" value="1">
                    <param name="uiMode" value="full">
                    <param name="autosize" value="1">
                    <param name="playcount" value="1">
                    <embed type="application/x-mplayer2" src="<?php echo $model->url ?>" width="800" height="600"
                           autostart="false" showcontrols="true"
                           pluginspage="http://www.microsoft.com/Windows/MediaPlayer/"></embed>
                </object>
            </div>
            <div id="comments">
                <?php if($model->commentCount>=1): ?>
                    <h3>
                        <?php echo $model->commentCount>1 ? $model->commentCount . ' comments' : 'One comment'; ?>
                    </h3>

                    <?php $this->renderPartial('/post/_comments',array(
                        'post'=>$model,
                        'comments'=>$model->comments,
                    )); ?>
                <?php endif; ?>

                <h3>Leave a Comment</h3>
                <?php if(!Yii::app()->user->isGuest){?>
                    <?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
                        <div class="flash-success">
                            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
                        </div>
                    <?php else: ?>
                        <?php $this->renderPartial('/comment/_form',array(
                            'model'=>$comment,
                        )); ?>
                    <?php endif; ?>
                <?php }else{ ?>
                    请先<?php echo CHtml::link('登录', array('/user/login')) ?>，再发表评论
                <?php } ?>

            </div><!-- comments -->

        </div>
</div>
