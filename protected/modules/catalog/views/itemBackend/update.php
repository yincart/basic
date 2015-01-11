<?php
$this->breadcrumbs = array(
    '商品列表' => array('admin'),
    $model->title => array('view', 'id' => $model->item_id),
    '更新',
);

$this->menu = array(
    array('label' =>Yii::t('main','Create Item'), 'icon' => 'plus', 'url' => array('create')),
    array('label' =>Yii::t('main','View Item'), 'icon' => 'eye-open', 'url' => array('view', 'id' => $model->item_id)),
    array('label' => Yii::t('main','Manage Item'), 'icon' => 'cog', 'url' => array('admin')),
);
?>

    <?php echo $this->renderPartial('_form', array('model'=>$model, 'image'=>$image, 'upload'=>$upload ,'is_view' => false)); ?>
