<?php
$this->breadcrumbs=array(
	'Menus'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'创建菜单', 'icon'=>'plus', 'url'=>array('create')),
);
?>

<h1>菜单列表</h1>

<div class="well well-large">
<?php
$criteria = new CDbCriteria;
$criteria->order = 't.root, t.lft'; // or 't.root, t.lft' for multiple trees
$menu = Menu::model()->findAll($criteria);
$level = 0;

foreach ($menu as $n => $m) {
    if ($m->level == $level)
        echo CHtml::closeTag('li') . "\n";
    else if ($m->level > $level)
        echo CHtml::openTag('ul') . "\n";
    else {
        echo CHtml::closeTag('li') . "\n";

        for ($i = $level - $m->level; $i; $i--) {
            echo CHtml::closeTag('ul') . "\n";
            echo CHtml::closeTag('li') . "\n";
        }
    }

    echo CHtml::openTag('li');
    echo CHtml::encode($m->name).'<span style="float:right">['.
            CHtml::link('更新', array('/menu/update', 'id'=>$m->id)).']['.
            CHtml::link('删除', '', array('submit'=>array('/menu/delete','id'=>$m->id),'style'=>'cursor:pointer', 'confirm'=>'Are you sure you want to delete this item?')).']</span>';
    $level = $m->level;
}

for ($i = $level; $i; $i--) {
    echo CHtml::closeTag('li') . "\n";
    echo CHtml::closeTag('ul') . "\n";
}

?>
</div>