<?php
$this->breadcrumbs=array(
    Yii::t('main','Orders')=>array('index'),
	$model->order_id=>array('view','id'=>$model->order_id),
    Yii::t('main','Update'),
);
?>

    <h1 style="text-align:center"><?php echo Yii::t('main','Update Orders');?> #<?php echo $model->order_id; ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model,'Item'=>$Item,'ItemSku'=>$ItemSku)); ?>
