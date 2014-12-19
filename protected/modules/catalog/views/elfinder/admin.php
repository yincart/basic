<?php
$this->breadcrumbs = array(
    '图片空间' => array('admin'),
    '管理',
);

$this->menu = array();
?>

<?php
// ElFinder widget
//$this->widget('ext.elFinder.ElFinderWidget', array(
//        'connectorRoute' => 'mall/elfinder/connector',
//    )
//);
?>
<iframe style="width: 100%; height: 405px" src="<?php echo Yii::app()->createUrl('/mall/elfinder/view') ?>"></iframe>