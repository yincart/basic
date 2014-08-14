<?php
$this->breadcrumbs = array(
    Yii::t('main', 'Currency') => array('index'),
    $model->name => array('view', 'id' => $model->currency_id),
    Yii::t('main', 'Update')
);

$this->menu = array(
    array('label' => Yii::t('main', 'List Currency'), 'icon' => 'list', 'url' => array('index')),
    array('label' => Yii::t('main', 'Create Currency'), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('main', 'View Currency'), 'icon' => 'eye-open', 'url' => array('view', 'id' => $model->currency_id)),
    array('label' => Yii::t('main', 'Manage Currency'), 'icon' => 'cog', 'url' => array('admin')),
);
?>

    <h1><?php echo Yii::t('main','Update Currency');?> #<?php echo $model->currency_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>