配置config
[页面输出]
	'modules' => array(
		...
				'plugin' => array(
					'class' => 'common.modules.plugin.PluginModule',
					'pluginRoot' => 'common.plugin',	# 插件目录，默认为 application.plugin
					// 'layout' => ''		# 后台插件管理页面主layout文件,默认为 //layouts/main
				),
		...
			),

[Hook渲染]
	'components' => array(
		...
				'plugin' => array(
					'class' => 'common.modules.plugin.components.HookRender', 	# HookRender 文件目录
				),
			),
		...
