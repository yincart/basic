<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

<div id="sidebar-nav">
        <?php $this->widget('bootstrap.widgets.TbMenu', array(
    'type'=>'list',
    'items'=>array_merge(array(
        array('label'=>'MAIN MENU'),
        array('label'=>'控制面板', 'icon'=>'home', 'url'=>array('/site/index')),
        '---',
        array('label'=>'会员列表', 'icon'=>'user', 'url'=>array('/user/admin/admin')),
        array('label'=>'管理员列表', 'icon'=>'cog', 'url'=>array('/adminUser/admin')),
        array('label'=>'权限控制', 'icon'=>'fire', 'url'=>array('/auth/assignment/index')),
        array('label'=>'CHILD MENU'),
        ),$this->menu),
)); ?>
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