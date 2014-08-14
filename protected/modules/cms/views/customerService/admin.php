<?php
/* @var $this CustomerServiceController */
/* @var $model CustomerService */


$this->breadcrumbs = array(
    Yii::t('main', 'CustomerService') => array('index'),
    Yii::t('main', 'Manage'),
);

$this->menu = array(
    array('label' => Yii::t('main', 'List CustomerService'), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('main', 'Create CustomerService'), 'icon' => 'plus', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#customer-service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

    <h1><?php echo Yii::t('main', 'Manage CustomerService'); ?></h1>


    <p>
        You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
            &lt;&gt;</b>
        or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
    </p>


    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
            'model' => $model,
        )); ?>
    </div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'customer-service-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
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