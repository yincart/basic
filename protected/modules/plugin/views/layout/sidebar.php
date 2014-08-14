<?php
Yii::app()->clientScript->registerCoreScript('jquery');
$this->beginContent($this->adminLayout);
?>
<div class="clearfix">
	<div  id="sidebar-nav">
		<?php
		$this->widget('bootstrap.widgets.TbNav', array(
			'type' => TbHtml::NAV_TYPE_LIST,
			'items' => array_merge(array(
				array('label' => Yii::t('PluginModule.lang', 'Plugin Manage')),
				array('label' => Yii::t('PluginModule.lang', 'Plugin List'), 'icon' => 'list', 'url' => array('/plugin/PluginManage/index')),
				array('label' => Yii::t('PluginModule.lang', 'Plugin Market'), 'icon' => 'download-alt', 'url' => '#'),
				'',
				array('label' => Yii::t('PluginModule.lang', 'Enabled Plugins')),
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
	$(function() {
		$("#sidebar-content").css('min-height', $(window).height() - 150);
	})
</script>
<?php $this->endContent(); ?>
