<?php
$this->breadcrumbs=array(
	'Languages',
);

$this->menu=array(
	array('label'=>'Create Language','icon'=>'plus','url'=>array('create')),
	array('label'=>'Manage Language','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>Languages</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
