<?php
$this->breadcrumbs = array(
    Yii::t('main','List Item')=> array('admin'),
    Yii::t('main','Create'),
);

$this->menu = array(
    array('label' =>Yii::t('main','Manage Item'), 'icon' => 'cog', 'url' => array('admin')),
);
?>

<div id="loading-header">
    <div class="header-row">
        <header>
            <h1 class="header-main"><i class="glyphicon glyphicon-plus"></i>&nbsp;&nbsp;<?php echo Yii::t('main','Create Item');?></h1>
        </header>
    </div>
</div>
<div class="col-lg-12 main-content">
    <?php
        echo $this->renderPartial('_form', array('model' => $model));
    ?>
</div>