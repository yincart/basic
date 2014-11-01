<?php
/* @var $this CustomerServiceController */
/* @var $model CustomerService */

$this->breadcrumbs = array(
    $this->content_title => array('index'),
    Yii::t('main', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('main', 'List CustomerService'), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('main', 'Create CustomerService'), 'icon' => 'plus', 'url' => array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'customer-service-grid',
    'dataProvider' => $model->search(),
//    'filter' => $model,
    'columns' => array(
        'id',
        'category_id',
        'type',
        'nick_name',
        'account',
        'is_show',
        /*
        'sort_order',
        */
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
)); ?>