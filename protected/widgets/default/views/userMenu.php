<ul>
	<li><?php echo CHtml::link('发布新闻',array('post/create')); ?></li>
	<li><?php echo CHtml::link('管理新闻',array('post/admin')); ?></li>
	<li><?php echo CHtml::link('审核评论',array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
	<li><?php echo CHtml::link('退出',array('site/logout')); ?></li>
</ul>