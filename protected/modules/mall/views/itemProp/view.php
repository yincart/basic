<?php
$this->breadcrumbs = array(
    Yii::t('main','ItemSku') => array('admin'),
    $model->prop_name => array('view', 'id' => $model->item_prop_id),
    Yii::t('main','View'),
);

$this->menu = array(
    array('label' =>Yii::t('main','Create ItemSku'), 'icon' => 'plus', 'url' => array('create')),
    array('label' =>Yii::t('main','Update ItemSku'), 'icon' => 'eye-open', 'url' => array('update', 'id' => $model->item_prop_id)),
    array('label' =>Yii::t('main','Manage ItemSku'), 'icon' => 'cog', 'url' => array('admin')),
);
?>

    <h1><?php echo Yii::t('main','Update ItemSku');?> #<?php echo $model->category->name; ?></h1>

<?php echo $this->renderPartial('_view', array('model' => $model, 'props' => $props, 'is_view' => true)); ?>