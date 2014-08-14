<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php Yii::app()->bootstrap->register(); ?>
<body>



<div class="main">
    <div class="pleft">
        <dl class="setpbox t1">
            <dt>安装步骤</dt>
            <dd>
                <ul>
                    <li class="succeed">许可协议</li>
                    <li class="succeed">环境检测</li>
                    <li class="succeed">参数配置</li>
                    <li class="now">安装模块</li>
                    <li>安装完成</li>
                </ul>
            </dd>
        </dl>
    </div>
    <div class="pright">
        <div class="pr-title"><h3>安装完成</h3></div>

        <div class="btn-box">
<?php echo CHtml::link('进入前台页面',Yii::app()->baseUrl.'/index.php',array('class'=>'btn btn-primary'))?>
<?php echo CHtml::link('进入后台页面',Yii::app()->baseUrl.'/backend.php',array('class'=>'btn btn-warning'))?>
        </div>
    </div>
</div>

<div class="foot">
</div>

</body>
</html>