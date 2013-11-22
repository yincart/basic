<?php
$this->breadcrumbs=array(
	'评论',
);
?>
<h1>评论</h1>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
