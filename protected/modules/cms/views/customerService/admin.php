<?php
$this->breadcrumbs = array(
    '客服' => array('admin'),
    '管理',
);

$this->menu = array(
    array('label' => '创建客服', 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('customer-service-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>管理客服</h1>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'customer-service-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'id',
        'category.name',
        array(
            'name' => 'type',
            'value' => '$data->getType()',
        ),
        'nick_name',
        'account',
        array(
            'name' => 'is_show',
            'value' => '$data->getShow()',
        ),
        'sort_order',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
