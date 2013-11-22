<style type="text/css">
	#tbl-plugins{
		width: 960px;
		font-size:12px;
		line-height: 17px;
		margin-bottom: 30px;
	}
	#tbl-plugins .g-plg{
		font-size:15px;
		font-weight: bold;
		margin-bottom: 5px;
	}
	.col{
		border: 1px solid #EEE;
		border-top: 3px solid #DDD;
		padding: 5px; 
		background:  #F3F3F5;		
	}
	.col .fl{
		float:left;
		min-height: 72px;
	}
	.col .fr{
		float: right;
		min-height: 72px;
	}
	.col-img{
		width:90px;
	}
	.col-label{
		width:250px;
	}
	.col-desc{
		width:488px;
	}
	.col-option{
		width:120px;
		text-align:center;
	}
	.col-img img{
		display: block;
	}
	.col-option div{
		margin-top: 25px;
	}
	.col-label .plg-name{
		font-size:13px;
		font-weight:bold;
		margin-top:5px;
	}

	.col-label .plg-id{
		font-size:11px;
		margin-top:5px;
	}
	.col-label .plg-cp{
		margin-top:10px;
	}
	.col-desc div{
		margin: 5px;
	}
</style>
<?php
foreach ($plugins as $status => $_plugins) {
	if (empty($_plugins))
		continue;
	echo '<div id="tbl-plugins">';
	switch ($status) {
		case PluginManger::STATUS_Enabled:
			echo '<div class="g-plg">已启用的插件：</div>';
			break;
		case PluginManger::STATUS_Installed:
			echo '<div class="g-plg">停用的插件：</div>';
			break;
		case PluginManger::STATUS_NotInstalled:
			echo '<div class="g-plg">未安装的插件：</div>';
			break;
	}
	?>

	<?php foreach ($_plugins as $plugin) { ?>
		<div class="col">
			<div class="col-img fl">
				<div> 
					<img src="http://localhost/tm.png" width="72" height="72" /> 
				</div>
			</div>
			<div class="col-label fl">
				<div class="plg-name"> <?php echo $plugin['plugin']->name; ?></div><div class="plg-id"><?php echo $plugin['plugin']->identify; ?></div>
				<div class="plg-cp"><a href="<?php echo $plugin['plugin']->website; ?>"><?php echo $plugin['plugin']->copyright; ?></a></div>
			</div>
			<div class="col-desc fl"><div><?php echo $plugin['plugin']->description; ?></div></div>
			<div class="col-option fl">
				<div>
					<?php
					switch ($status) {
						case PluginManger::STATUS_Enabled:
							?>
							<span><a href="<?php echo $this->createUrl('/plugin/pluginManage/disable', array('id' => $plugin['plugin']->identify)); ?>">停用</a></span>
							<span><a href="<?php echo $this->createUrl('/plugin/pluginManage/setting', array('id' => $plugin['plugin']->identify)); ?>">设置</a></span>
							<span><a href="<?php echo $this->createUrl('/plugin/pluginManage/uninstall', array('id' => $plugin['plugin']->identify)); ?>">卸载</a></span>
							<?php
							break;
						case PluginManger::STATUS_Installed:
							?>
							<span><a href="<?php echo $this->createUrl('/plugin/pluginManage/enable', array('id' => $plugin['plugin']->identify)); ?>">启用</a></span>
							<span><a href="<?php echo $this->createUrl('/plugin/pluginManage/setting', array('id' => $plugin['plugin']->identify)); ?>">设置</a></span>
							<span><a href="<?php echo $this->createUrl('/plugin/pluginManage/uninstall', array('id' => $plugin['plugin']->identify)); ?>">卸载</a></span>
							<?php
							break;
						case PluginManger::STATUS_NotInstalled:
							?>
							<span><a href="<?php echo $this->createUrl('/plugin/pluginManage/install', array('id' => $plugin['plugin']->identify)); ?>">安装</a></span>
							<?php
							break;
					}
					?>
					<span><a href="#">查看</a></span>
				</div>
			</div>
			<div style="clear:both;"></div>
		</div>
	<?php } ?>
	</div>
<?php } ?>