<?php
$this->breadcrumbs = array(
    Yii::t('main','ItemProp') => array('admin'),
    $model->prop_name => array('view', 'id' => $model->prop_id),
    Yii::t('main','View'),
);

$this->menu = array(
    array('label' =>Yii::t('main','Create ItemProp'), 'icon' => 'plus', 'url' => array('create')),
    array('label' =>Yii::t('main','Update ItemProp'), 'icon' => 'eye-open', 'url' => array('update', 'id' => $model->prop_id)),
    array('label' =>Yii::t('main','Manage ItemProp'), 'icon' => 'cog', 'url' => array('admin')),
);
?>

<?php echo $this->renderPartial('_view', array('model' => $model, 'props' => $props, 'is_view' => true)); ?>