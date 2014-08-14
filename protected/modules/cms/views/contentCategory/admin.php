<?php
$this->breadcrumbs = array(
    Yii::t('main', 'Content Category') => array('admin'),
    Yii::t('main', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('main', 'Create Content Category'), 'icon' => 'plus', 'url' => array('create')),
);
?>
<h1><?php echo Yii::t('main','Content Category');?></h1>
<div class="well well-large">
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
            'id' => 'contentForm',
            'htmlOptions' => array(
                'class' => 'form-horizontal',
            )
        )
    );
$options = array(
    array(
        'text' => '更新',
        'url' => '/cms/contentCategory/update',
    ),
    array(
        'text' => '删除',
        'htmlOptions' => array(
            'submit' => '/cms/contentCategory/delete',
            'style' => 'cursor:pointer',
            'confirm' => 'Are you sure you want to delete this item?'
        )
    )
);
echo Category::model()->getTree(1, $options, 'getLabel');
    $this->endWidget();
?>
</div>