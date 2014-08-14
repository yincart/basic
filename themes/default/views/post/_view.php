<div class="post_wrap">
	<div class="post_title">
		<?php echo CHtml::link(CHtml::encode($data->title), $data->getUrl()); ?>
	</div>
	<div class="post_author">
		作者：<?php echo $data->author->username ?> 时间：<?php echo date('Y-m-d',$data->create_time); ?>
	</div>
	<div class="post_content">
		<?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			echo $data->content;
			$this->endWidget();
		?>
	</div>
	<div class="post_nav">
		<b>标签：</b>
		<?php echo implode(', ', $data->tagLinks); ?>
		<br/>
		<?php echo CHtml::link('固定链接', $data->getUrl()); ?> |
		<?php echo CHtml::link("评论 ({$data->commentCount})",$data->getUrl().'#comments'); ?> |
		上次更新于 <?php echo date('Y-m-d',$data->update_time); ?>
	</div>
</div>
