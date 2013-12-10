<!DOCTYPE html>
<html>
<head>
    <title><?php echo Yii::app()->name ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo F::themeUrl() . '/css/main.css' ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo F::themeUrl() . '/css/box.css' ?>"/>
    <?php Yii::app()->bootstrap->register(); ?>
</head>
<body>
<div class="top-nav">
    <div class="container">
        <div class="row">
            <div class="span4">
                <ul>
                    <li>信息</li>
                </ul>
            </div>
            <div class="span8">
                <ul>
                    <li>导航</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="header">
    <div class="container">
        <div class="row">
            <div class="span3">
                LOGO
            </div>
            <div class="span9">
                搜索
            </div>
        </div>
    </div>
</div>
<div class="menu">
    <div class="container">
        <ul>
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
        </ul>
    </div>
</div>

<div class="clearfix"></div>
<div class="container">
    <div class="content">
        <?php echo $content; ?>
    </div>
    <div class="footer">1111</div>
</div>
</body>
</html>