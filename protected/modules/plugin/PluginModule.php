<?php

class PluginModule extends CWebModule {

	public $pluginRoot = 'application.plugin';
	public $layout = '//layouts/main';

	public function init() {
		$moduleDir = dirname(__FILE__);
		Yii::setPathOfAlias('pluginModule', $moduleDir);
		Yii::import('pluginModule.lib.*');
		Yii::import('pluginModule.interface.*');
		Yii::import('pluginModule.model.*');
		require_once($moduleDir . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'PluginAbstract.php');
	}

}
