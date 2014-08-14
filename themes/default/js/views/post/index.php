<?php
$this->pageTitle = Yii::app()->name;
$this->breadcrumbs = array(
    '新闻列表' => array('/post/index'),
);
?>
<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>


<div class="box">
    <div class="box-title" style="text-align: left">新闻列表</div>
    <div class="box-content">
        <?php $this->widget('zii.widgets.CListView', array(
            'dataProvider'=>$dataProvider,
            'itemView'=>'_view',
            'template'=>"{items}\n{pager}",
        )); ?>
    </div>
</div>