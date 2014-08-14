<?php
$this->breadcrumbs = array(
    '图片空间' => array('admin'),
    '管理',
);

$this->menu = array();
?>

    <h1>管理图片</h1>
<?php
// ElFinder widget
$this->widget('ext.elFinder.ElFinderWidget', array(
        'connectorRoute' => 'mall/elfinder/connector',
    )
);
?>