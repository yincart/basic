<?php
$this->breadcrumbs=array(
	'Comments',
);
?>

<h3>评论</h3>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
