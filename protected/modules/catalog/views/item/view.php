<?php
$this->breadcrumbs = array(
    Yii::t('main', 'List Item') => array('admin'),
    Yii::t('main', 'View '),
);

$this->menu = array(
    array('label' => Yii::t('main','Create Item'), 'icon' => 'plus', 'url' => array('create')),
    array('label' => Yii::t('main','Update Item'), 'icon' => 'eye-open', 'url' => array('update', 'id' => $model->item_id)),
    array('label' =>Yii::t('main','Manage Item'), 'icon' => 'cog', 'url' => array('admin')),
);
?>

<div id="loading-header">
    <div class="header-row">
        <header>
            <h1 class="header-main"><i class="glyphicon glyphicon-pencil"></i>&nbsp;&nbsp;<?php echo Yii::t('main','View Item');?> #<?php echo $model->title; ?></h1>
        </header>
    </div> <!-- /.header-row -->
</div>
<div class="col-lg-12 main-content">
    <?php echo $this->renderPartial('_view', array('model'=>$model, 'image'=>$image, 'upload'=>$upload, 'is_view' => true)); ?>
</div>