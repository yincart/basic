<?php
$this->breadcrumbs=array(
    Yii::t('main','Orders')=>array('index'),
    Yii::t('main','Create')
);
?>
    <h1 style="text-align:center"><?php echo Yii::t('main','Create Orders');?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model,'order_item'=>$order_item)); ?>