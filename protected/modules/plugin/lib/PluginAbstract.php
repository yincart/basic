<?php

/**
 * Yii-Plugin module
 * 
 * @author Viking Robin <healthlolicon@gmail.com> 
 * @link https://github.com/health901/yii-plugin
 * @license https://github.com/health901/yii-plugins/blob/master/LICENSE
 * @version 1.0
 */
abstract class PluginAbstract extends PluginBase {

	public $plugin;

	public function run() {
		return FALSE;
	}

	public function __get($name) {
		$value = parent::__get($name);
		if (!$value && $this->plugin->$name !== NULL) {
			return $this->plugin->$name;
		} else {
			return $value;
		}
	}

	public function Owner($plugin) {
		$this->plugin = $plugin;
		$this->i18n = $plugin->i18n;
		$this->pluginDir = $plugin->pluginDir;
	}

}

/**
 * 插件单页类
 */
class PluginAction extends PluginAbstract {
	
}

/**
 * 插件钩子类
 */
class PluginHook extends PluginAbstract {
	
}

/**
 * 插件管理页类
 */
class PluginAdmin extends PluginAbstract {

	/**
	 * Stores a flash message. A flash message is available only in the current and the next requests
	 * @param string $key   key identifying the flash message
	 * @param mixed $value flash message
	 */
	public function setFlash($key, $value) {
		Yii::app()->user->setFlash($key, $value);
	}

	/**
	 * Returns a flash message. A flash message is available only in the current and the next requests.
	 * @param  string  $key          key identifying the flash message
	 * @param  mixed  $defaultValue value to be returned if the flash message is not available.
	 * @param  boolean $delete       whether to delete this flash message after accessing it. Defaults to true.
	 * @return mixed                the message message
	 */
	public function getFlash($key, $defaultValue = NULL, $delete = true) {
		return Yii::app()->user->getFlash($key, $defaultValue, $delete);
	}

	/**
	 * Returns all flash messages. This method is similar to getFlash except that it returns all currently available flash messages.
	 * @param  boolean $delete whether to delete the flash messages after calling this method.
	 * @return array          flash messages (key => message).
	 */
	public function getFlashes($delete = true) {
		return Yii::app()->user->getFlashes();
	}

}