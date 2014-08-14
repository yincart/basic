<?php
$this->breadcrumbs = array(
    'Specifications' => array('index'),
    'Manage',
);

$this->menu = array(
    array('label' => 'List Specification', 'url' => array('index')),
    array('label' => 'Create Specification', 'icon' => 'plus', 'url' => array('create')),
);
?>

<h1>Manage Specifications</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search', '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
    <?php
    $this->renderPartial('_search', array(
        'model' => $model,
    ));
    ?>
</div><!-- search-form -->

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'specification-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'spec_id',
        'spec_name',
        array(
            'name' => 'spec_show_type',
            'value' => '$data->getShowType()',
        ),
        array(
            'name' => 'spec_type',
            'value' => '$data->getType()',
        ),
        'spec_memo',
        array(
            'name' => 'spec.spec_value',
            'value' => '$data->getSpecValues()',
            'htmlOptions' => array('width'=>'300px')
        ),
        'sort_order',
        array(
            'class' => 'bootstrap.widgets.TbButtonColumn',
        ),
    ),
));
?>
