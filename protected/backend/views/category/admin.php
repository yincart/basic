<?php
$this->breadcrumbs=array(
	'Categories'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'创建分类', 'icon'=>'plus', 'url'=>array('create')),
);

?>

<h1>管理分类</h1>

<div class="well well-large">
<?php
$criteria = new CDbCriteria;
$criteria->order = 't.root, t.lft'; // or 't.root, t.lft' for multiple trees
$categories = Category::model()->findAll($criteria);
$level = 0;

foreach ($categories as $n => $category) {
    if ($category->level == $level)
        echo CHtml::closeTag('li') . "\n";
    else if ($category->level > $level)
        echo CHtml::openTag('ul') . "\n";
    else {
        echo CHtml::closeTag('li') . "\n";

        for ($i = $level - $category->level; $i; $i--) {
            echo CHtml::closeTag('ul') . "\n";
            echo CHtml::closeTag('li') . "\n";
        }
    }

    echo CHtml::openTag('li');
    echo CHtml::encode($category->name).'<span style="float:right">['.
            CHtml::link('更新', array('/category/update', 'id'=>$category->id)).']['.
            CHtml::link('删除', '', array('submit'=>array('/category/delete','id'=>$category->id),'style'=>'cursor:pointer', 'confirm'=>'Are you sure you want to delete this item?')).']</span>';
    $level = $category->level;
}

for ($i = $level; $i; $i--) {
    echo CHtml::closeTag('li') . "\n";
    echo CHtml::closeTag('ul') . "\n";
}

?>
</div>