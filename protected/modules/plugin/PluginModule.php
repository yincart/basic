<?php

/**
 * Yii-Plugin module
 * 
 * @author Viking Robin <healthlolicon@gmail.com> 
 * @link https://github.com/health901/yii-plugin
 * @license https://github.com/health901/yii-plugins/blob/master/LICENSE
 * @version 1.0
 */
class PluginModule extends CWebModule {

	public $pluginRoot = 'application.plugin';
	public $layout = '//layouts/main';
	public $moduleDir;

	public function init() {
		$this->moduleDir = dirname(__FILE__);
		Yii::setPathOfAlias('pluginModule', $this->moduleDir);
		Yii::import('pluginModule.lib.*');
		Yii::import('pluginModule.interface.*');
		Yii::import('pluginModule.model.*');
		require_once($this->moduleDir . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'PluginAbstract.php');
	}

}
