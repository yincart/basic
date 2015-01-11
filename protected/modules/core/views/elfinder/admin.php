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
//        'connectorRoute' => 'core/elfinder/connector',
//    )
//);
?>
<iframe style="width: 100%; height: 405px" src="<?php echo Yii::app()->createUrl('/core/elfinder/view') ?>"></iframe>