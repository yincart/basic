<?php
$this->breadcrumbs = array(
    Yii::t('main','List Item')=> array('admin'),
    Yii::t('main','Create'),
);

$this->menu = array(
    array('label' =>Yii::t('main','Manage Item'), 'icon' => 'cog', 'url' => array('admin')),
);
?>

<?php
        echo $this->renderPartial('_form', array('model' => $model));
?>