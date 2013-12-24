<?php
$this->breadcrumbs = array(
    '商品列表' => array('admin'),
    '管理',
);

$this->menu = array(
    array('label' => '创建商品', 'icon' => 'plus', 'url' => array('create')),
);
?>

    <h3>管理商品</h3>
<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'item-form',
    'action' => 'bulk',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
));
?>
<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'item-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'selectableRows' => 2,
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'name' => 'item_id',
            'value' => '$data->item_id',
        ),
        'category.name',
        'title',
        'stock',
        'min_number',
        'price',
        array(
            'name' => 'is_show',
            'value' => '$data->isShow()',
        ),
        array(
            'name' => 'is_promote',
            'value' => '$data->isPromote()',
        ),
        array(
            'name' => 'is_new',
            'value' => '$data->isNew()',
        ),
        array(
            'name' => 'is_hot',
            'value' => '$data->isHot()',
        ),
        array(
            'name' => 'is_best',
            'value' => '$data->isBest()',
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
    <div class="control-group bulk" style="padding-top:10px">

        <?php
        echo CHtml::radioButtonList('act', '', array(
                'delete' => '删除产品',
                'is_show' => '上架',
                'un_show' => '下架',
                'is_promote' => '促销',
                'un_promote' => '取消促销',
                'is_new' => '新品',
                'un_new' => '取消新品',
                'hot' => '热卖',
                'un_hot' => '取消热卖',
                'best' => '精品',
                'un_best' => '取消精品',
            ), array('separator' => '&nbsp;')
        )
        ?>

        <?php echo CHtml::submitButton('提交', array('class' => 'btn btn-primary')); ?>

    </div>
<?php $this->endWidget(); ?>