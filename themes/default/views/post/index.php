<?php
$this->pageTitle = Yii::app()->name . ' - 新闻列表';
$this->breadcrumbs = array(
    '新闻列表'
);
?>
    <?php if(!empty($_GET['tag'])): ?>
        <h3>标签归档：<i><?php echo CHtml::encode($_GET['tag']); ?></i></h3>
    <?php endif; ?>

    <?php $this->widget('zii.widgets.CListView', array(
        'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
        'template'=>"{items}\n{pager}",
    )); ?>

