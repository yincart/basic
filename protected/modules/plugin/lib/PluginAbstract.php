<?php

/**
 * website PluginAction
 *
 * @author  Jiankang.Wang
 * @Date:   2013-9-26
 * @Time:   5:18:54 PM
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

class PluginAction extends PluginAbstract {
	
}

class PluginAdmin extends PluginAbstract {
	
}

class PluginHook extends PluginAbstract {
	
}

?>
