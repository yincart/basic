<ul>
	<li><?php echo CHtml::link(Yii::t('cms', 'Create New Post'),array('post/create')); ?></li>
	<li><?php echo CHtml::link(Yii::t('cms', 'Manage Posts'),array('post/admin')); ?></li>
	<li><?php echo CHtml::link(Yii::t('cms', 'Approve Comments'),array('comment/index')) . ' (' . Comment::model()->pendingCommentCount . ')'; ?></li>
	<li><?php echo CHtml::link(Yii::t('cms', 'Logout'),array('site/logout')); ?></li>
</ul>