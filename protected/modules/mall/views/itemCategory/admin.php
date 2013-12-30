<?php
$this->breadcrumbs = array(
    'Categories' => array('admin'),
    'Manage',
);

$this->menu = array(
    array('label' => '创建分类', 'icon' => 'plus', 'url' => array('create')),
);
?>

<h1>管理分类</h1>

<div class="well well-large">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'horizontalForm',
            'htmlOptions' => array(
                'class' => 'form-horizontal',
            )
        )
    );
    $options = array(
        array(
            'text' => '商品',
            'url' => '/mall/item/admin',
            'id' => 'Item[category_id]',
        ),
        array(
            'text' => '属性',
            'url' => '/mall/itemProp/admin',
            'id' => 'ItemProp[category_id]',
        ),
        array(
            'text' => '更新',
            'url' => '/mall/itemCategory/update',
        ),
        array(
            'text' => '删除',
            'htmlOptions' => array(
                'submit' => '/mall/itemCategory/delete',
                'style' => 'cursor:pointer',
                'confirm' => 'Are you sure you want to delete this item?'
            )
        )
    );
    echo Category::model()->getTree(3, $options, 'getLabel');
    $this->endWidget();
    ?>
</div>
