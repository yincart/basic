<?php
$this->breadcrumbs=array(
    Yii::t('main','Category')=>array('admin'),
    Yii::t('main','Manage'),
);

$this->menu=array(
	array('label'=>Yii::t('main','Create Category'), 'icon'=>'plus', 'url'=>array('create')),
);
?>

<div class="well well-large">
<?php
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id' => 'Menu',
        'htmlOptions' => array(
            'class' => 'form-horizontal',
        )
    )
);

$options = array(
    array(
        'text' => '更新',
        'url' => '/core/category/update',
    ),
    array(
            'text' => '删除',
            'htmlOptions' => array(
                'submit' => '/core/category/delete',
                'style' => 'cursor:pointer',
                'confirm' => 'Are you sure you want to delete this item?'
            )
        )
);
echo Category::model()->getTree(0, $options, 'getLabel', 1);

//$options = array(
//    array(
//        'text' => '更新',
//        'url' => '/mall/itemCategory/update',
//    ),
//    array(
//        'text' => '删除',
//        'htmlOptions' => array(
//            'submit' => '/mall/itemCategory/delete',
//            'style' => 'cursor:pointer',
//            'confirm' => 'Are you sure you want to delete this item?'
//        )
//    )
//);
//echo Category::model()->getTree(3, $options, 'getLabel');
$this->endWidget();
?>
</div>