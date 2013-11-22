<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div id="sidebar-nav">
    <?php
    $this->widget('bootstrap.widgets.TbMenu', array(
	'type' => 'list',
	'items' => array_merge(array(
	    array('label' => 'MAIN MENU'),
	    array('label' => '控制面板', 'icon' => 'home', 'url' => array('/site/index')),
	    '---',
	    array('label' => '内容分类', 'icon' => 'bookmark', 'url' => array('/cms/contentCategory/admin')),
	    array('label' => '单页管理', 'icon' => 'leaf', 'url' => array('/cms/page/admin')),
	    array('label' => '文章管理', 'icon' => 'book', 'url' => array('/cms/article/admin')),
	    array('label' => '留言管理', 'icon' => 'envelope', 'url' => array('/cms/feedback/admin')),
//        array('label'=>'评论管理', 'icon'=>'comment', 'url'=>array('/cms/comment/admin')),
	    '---',
	    array('label' => '广告管理', 'icon' => 'facetime-video', 'url' => array('/cms/ad/admin')),
	    array('label' => '友情链接', 'icon' => 'share', 'url' => array('/cms/friendLink/admin')),
	    array('label' => '邮件订阅', 'icon' => 'envelope', 'url' => array('/cms/newsletterSubscriber/admin')),
	    array('label' => '客服管理', 'icon' => 'user', 'url' => array('/cms/customerService/admin')),
	    '---',
	    array('label' => 'CHILD MENU'),
		), $this->menu),
    ));
    ?>
</div>
<div id="sidebar-content">
    <div class="row-fluid">
	<div class="span12">
	    <?php if (isset($this->breadcrumbs)): ?>
		<?php
		$this->widget('bootstrap.widgets.TbBreadcrumbs', array(
		    'links' => $this->breadcrumbs,
		));
		?><!-- breadcrumbs -->
	    <?php endif ?>
	    <?php echo $content; ?>
	</div>
    </div>
</div>
<?php $this->endContent(); ?>