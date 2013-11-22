<?php
$this->breadcrumbs = array(
    '内容分类' => array('index'),
    $model->name => array('view', 'id' => $model->id),
    '更新',
);

$this->menu = array(
    array('label' => '创建内容分类', 'icon' => 'plus', 'url' => array('create')),
    array('label' => '管理内容分类', 'icon'=>'cog','icon'=>'cog','url'=>array('admin')),
);
?>

<h1>更新内容分类 <?php echo $model->id; ?></h1>
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>