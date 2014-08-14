<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="language" content="en"/>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <?php Yii::app()->bootstrap->register(); ?>
    <?php Yii::app()->getClientScript(); ?>
</head>
<body>
<?php
$this->widget('ext.elFinder.ElFinderWidget', array(
        'connectorRoute' => '/mall/elfinder/connector',
    )
);
?>
</body>
</html>