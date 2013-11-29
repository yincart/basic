<?php $this->beginContent($this->adminLayout); ?>
<div>
	<div id="sidebar-nav">
		<?php
		$this->widget('bootstrap.widgets.TbNav', array(
            'type' => TbHtml::NAV_TYPE_LIST,
			'items' => array_merge(array(
				array('label' => '插件管理'),
				array('label' => '插件列表', 'icon' => 'list', 'url' => array('/plugin/PluginManage/index')),
				array('label' => '插件市场', 'icon' => 'download-alt', 'url' => '#'),
				'',
				array('label' => '已启用插件'),
					), $this->menu),
			'htmlOptions' => array('style' => 'width:200px;border:0;float: left')
		));
		?>
	</div>
	<div id="sidebar-content" style="float:left">
		<div  style="width:100%">
			<?php echo $content; ?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(function(){
		$("#sidebar-content").css('min-height',$(window).height()-150);
	})
</script>
<?php $this->endContent(); ?>
