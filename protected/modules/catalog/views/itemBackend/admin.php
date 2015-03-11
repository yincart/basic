<?php
$this->breadcrumbs = array(
    Yii::t('main', 'List Item') => array('admin'),
    Yii::t('main', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('frontend','Create Item'), 'icon' => 'plus', 'url' => array('create')),
);
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'item-form',
    'action' => F::url('/catalog/itemBackend/bulk'),
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    'enableAjaxValidation' => false,
));

$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'item-grid',
    'type' => 'striped bordered condensed',
    'dataProvider' => $model->search(),
//    'filter' => $model,
    'selectableRows' => 2,
    'enableHistory' => 'true',
    'columns' => array(
        array(
            'class' => 'CCheckBoxColumn',
            'name' => 'item_id',
            'value' => '$data->item_id',
        ),
        array(
            'name' =>   'category.name',
            'header' => '商品分类',
        ),
        array(
            'name' => 'title',
            'header' => '商品标题',
        ),
//        array(
//            'name' => 'stock',
//            'header' => '库存',
//        ),
//        array(
//            'name' => 'min_number',
//            'header'=> '最小数量',
//        ),
//        array(
//            'name'=> 'price',
//            'header' => '价格',
//        ),
        array(
            'name' => 'is_show',
            'header' => '上架',
            'value' => 'Tbfunction::showYesOrNo($data->is_show)',
            'filter' => Tbfunction::ReturnYesOrNo(),
        ),
        array(
            'name' => 'is_promote',
            'header' => '热销',
            'value' => 'Tbfunction::showYesOrNo($data->is_promote)',
            'filter' => Tbfunction::ReturnYesOrNo(),
        ),
        array(
            'name' => 'is_new',
            'header' => '新品',
            'value' => 'Tbfunction::showYesOrNo($data->is_new)',
            'filter' => Tbfunction::ReturnYesOrNo(),
        ),
        array(
            'name' => 'is_hot',
            'header' => '热卖',
            'value' => 'Tbfunction::showYesOrNo($data->is_hot)',
            'filter' => Tbfunction::ReturnYesOrNo(),
        ),array(
            'name' => 'is_best',
            'header' => '精品',
            'value' => 'Tbfunction::showYesOrNo($data->is_best)',
            'filter' => Tbfunction::ReturnYesOrNo(),
        ),
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),

    ),
));
?>
<div class="span12">
<div class="bulk-action span10">
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
</div>
<div class="bulk-action span2">
<?php echo CHtml::submitButton('提交', array('class' => 'btn btn-primary')); ?>
</div>
    </div>
<?php $this->endWidget(); ?>