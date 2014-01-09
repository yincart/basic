<?php
$this->breadcrumbs = array(
    '图片空间' => array('admin'),
    '管理',
);

$this->menu = array();
?>

    <h3>管理图片</h3>
<?php
// ElFinder widget
$this->widget('ext.elFinder.ElFinderWidget', array(
        'connectorRoute' => 'mall/elfinder/connector',
    )
);
?>