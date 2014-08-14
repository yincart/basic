<?php
$this->breadcrumbs=array(
    Yii::t('main','Admin Users')=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Admin Users'), 'icon'=>'plus', 'url'=>array('create')),
);

?>


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
<h1><?php echo Yii::t('main','List Admin Users');?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'admin-user-grid',
        	'dataProvider'=>$model->search(),
        	'filter'=>$model,
        	'columns'=>array(
        		'id',
        		'username',
        		'email',
        		'profile',
        		array(
        			'class'=>'bootstrap.widgets.TbButtonColumn',
        		),
        	),
)); ?>
</div>