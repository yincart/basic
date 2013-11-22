<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div style="text-align:center">
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); ?>

<?php $this->endWidget(); ?>
</div>
