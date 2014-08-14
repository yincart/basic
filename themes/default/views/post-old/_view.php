<!--<div class="post">-->
<!--	<div class="post_title">-->
<!--		--><?php //echo CHtml::link(CHtml::encode($data->title), $data->getUrl()); ?>
<!--	</div>-->
<!--	<div class="author">-->
<!--		posted by --><?php //echo $data->author->username . ' on ' . date('F j, Y',$data->create_time); ?>
<!--	</div>-->
<!--	<div class="content">-->
<!--		--><?php
//			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
//			echo $data->content;
//			$this->endWidget();
//		?>
<!--	</div>-->
<!--	<div class="post_nav">-->
<!--		<b>Tags:</b>-->
<!--		--><?php //echo implode(', ', $data->tagLinks); ?>
<!--		<br/>-->
<!--		--><?php //echo CHtml::link('Permalink', $data->getUrl()); ?><!-- |-->
<!--		--><?php //echo CHtml::link("Comments ({$data->commentCount})",$data->url.'#comments'); ?><!-- |-->
<!--		Last updated on --><?php //echo date('F j, Y',$data->update_time); ?>
<!--	</div>-->
<!--</div>-->

<div class="container_24">

    <div class="clearfix"></div>
    <div class="container" style="overflow: hidden">
        <div class="grid_18 alpha">
            <div id="content" style="background: #ffffff;padding: 20px;font-size: 14px;">
                <p>
                    <a class="news-link" href="/basic/site/index">首页</a>>><a href="/basic/post/index" class="news-link">新闻列表</a>>> <?php echo CHtml::link(CHtml::encode($data->title), $data->getUrl()); ?>
                </p>
                <h3  style="background:#2d2d2d; color: white"><?php echo $data->title; ?></h3>
                <div class="author">
                   发表于 <?php echo $data->author->username . ' ' . date('F j, Y',$data->create_time); ?>
                </div>
                <div class="post_nav">
                    <b>摘要:</b>
                    <?php echo $data->summary; ?>
                    <br/>
                </div>
                <div>
                    <?php echo $data->content; ?>
                </div><!-- content -->
                <div class="post_nav">
                    <b>标签:</b>
                    <?php echo implode(', ', $data->tagLinks); ?>
                    <br/>
                    <?php echo CHtml::link('链接', $data->getUrl()); ?> |
                    <?php echo CHtml::link("评论 ({$data->commentCount})",$data->url.'#comments'); ?> |
                    最后更新时间： <?php echo date('F j, Y',$data->update_time); ?>
                </div>
            </div>

            <!-- sidebar -->
        </div>
    </div>
</div>