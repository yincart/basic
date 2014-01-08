<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>

    <div id="sidebar-nav">
        <?php $this->widget('bootstrap.widgets.TbNav', array(
            'type' => TbHtml::NAV_TYPE_LIST,
            'items' => array_merge(array(
                array('label' => 'MAIN MENU'),
                array('label' => '控制面板', 'icon' => 'home', 'url' => array('/site/index')),
                array('label' => '菜单管理', 'icon' => 'list', 'url' => array('/menu/admin')),
                array('label' => '分类管理', 'icon' => 'leaf', 'url' => array('/category/admin')),
                array('label' => '皮肤管理', 'icon' => 'cog', 'url' => array('/theme/admin')),
                array('label' => '语言管理', 'icon' => 'flag', 'url' => array('/language/admin')),
                array('label' => '货币管理', 'icon' => 'cog', 'url' => array('/currency/admin')),
                array('label' => 'CHILD MENU'),
            ), $this->menu),
        )); ?>
    </div>
    <div id="sidebar-content">
        <div class="row-fluid">
            <div class="span12">
                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
                <?php endif ?>
                <?php echo $content; ?>
            </div>
        </div>
    </div>
<?php $this->endContent(); ?>