<?php
/* @var $this AuthController */
?>
<?php $this->beginContent('//layouts/main'); ?>
    <div id="sidebar-nav">
        <?php $this->widget('bootstrap.widgets.TbNav', array(
            'type'=>TbHtml::NAV_TYPE_LIST,
            'items'=>array_merge(array(
                array('label'=>'主菜单'),
//        array('label'=>'控制面板', 'icon'=>'home', 'url'=>array('/site/index')),
                array('label'=>'会员列表', 'icon'=>'user', 'url'=>array('/user/admin/admin')),
                array('label'=>'管理员列表', 'icon'=>'cog', 'url'=>array('/adminUser/admin')),
                array('label'=>'权限控制', 'icon'=>'fire', 'url'=>array('/auth/assignment/index')),
                array('label'=>'子目录'),
            ),$this->menu),
        )); ?>
    </div>
<div id="sidebar-content">
    <?php if (isset($this->breadcrumbs)): ?>
        <?php
        $this->widget('bootstrap.widgets.TbBreadcrumb', array(
            'links' => $this->breadcrumbs,
        ));
        ?><!-- breadcrumbs -->
    <?php endif ?>
<div class="auth-module">

    <?php $this->widget(
        'bootstrap.widgets.TbNav',
        array(
            'type' => TbHtml::NAV_TYPE_TABS,
            'items' => array(
                array(
                    'label' => Yii::t('AuthModule.main', 'Assignments'),
                    'url' => array('/auth/assignment/index'),
                    'active' => $this instanceof AssignmentController,
                ),
                array(
                    'label' => $this->capitalize($this->getItemTypeText(CAuthItem::TYPE_ROLE, true)),
                    'url' => array('/auth/role/index'),
                    'active' => $this instanceof RoleController,
                ),
                array(
                    'label' => $this->capitalize($this->getItemTypeText(CAuthItem::TYPE_TASK, true)),
                    'url' => array('/auth/task/index'),
                    'active' => $this instanceof TaskController,
                ),
                array(
                    'label' => $this->capitalize($this->getItemTypeText(CAuthItem::TYPE_OPERATION, true)),
                    'url' => array('/auth/operation/index'),
                    'active' => $this instanceof OperationController,
                ),
            ),
        )
    );?>

    <?php echo $content; ?>
</div>
</div>
<?php $this->endContent(); ?>