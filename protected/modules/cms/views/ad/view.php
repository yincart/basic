<?php
$this->breadcrumbs = array(
    Yii::t('main', 'Flash Ads')=> array('index'),
    $model->title,
);

$this->menu = array(
    array('label' =>Yii::t('main', 'Create Flash Ads'), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('main', 'Update Flash Ads'), 'icon' => 'pencil', 'url' => array('update', 'id' => $model->id)),
    array('label' =>Yii::t('main', 'Delete Flash Ads'), 'icon' => 'trash', 'url' => '#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm' => 'Are you sure you want to delete this item?')),
    array('label' =>Yii::t('main', 'Manage Flash Ads'), 'icon' => 'cog', 'url' => array('admin')),
);
?>

    <h1><?php echo Yii::t('main','View Flash Ads');?> #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'title',
        'pic',
        'url',
        'content:html',
        'sort_order',
    ),
)); ?>