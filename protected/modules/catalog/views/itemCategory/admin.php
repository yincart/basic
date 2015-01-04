<?php
$this->breadcrumbs = array(
    Yii::t('main','Category') => array('admin'),
    Yii::t('main','Manage'),
);

$this->menu = array(
    array('label' => Yii::t('main','Create Category'), 'icon' => 'plus', 'url' => array('create')),
);
?>

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
            'url' => '/catalog/item/admin',
            'id' => 'Item[category_id]',
        ),
        array(
            'text' => '属性',
            'url' => '/catalog/itemProp/admin',
            'id' => 'ItemProp[category_id]',
        ),
        array(
            'text' => '更新',
            'url' => '/catalog/itemCategory/update',
        ),
        array(
            'text' => '删除',
            'htmlOptions' => array(
                'submit' => '/catalog/itemCategory/delete',
                'style' => 'cursor:pointer',
                'confirm' => 'Are you sure you want to delete this item?'
            )
        )
    );
    echo Category::model()->getTree(3, $options, 'getLabel');
    $this->endWidget();
    ?>