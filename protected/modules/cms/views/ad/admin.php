<?php
$this->breadcrumbs = array(
    Yii::t('main', 'Flash Ads') => array('admin'),
    Yii::t('main', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('main', 'Create Flash Ads'), 'icon' => 'plus', 'url' => array('create')),
);
?>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'flash-ad-grid',
    'dataProvider' => $model->search(),
//    'filter' => $model,
    'columns' => array(
        'id',
        'title',
//        'pic',
//        'url',
//        'theme',
        'sort_order',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>