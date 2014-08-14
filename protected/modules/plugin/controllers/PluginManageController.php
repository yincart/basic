<?php

/**
 * Yii-Plugin module
 * 
 * @author Viking Robin <healthlolicon@gmail.com> 
 * @link https://github.com/health901/yii-plugin
 * @license https://github.com/health901/yii-plugins/blob/master/LICENSE
 * @version 1.0
 */
class PluginManageController extends CController {

	public $layout = '/layout/sidebar';
	public $adminLayout;
	public $menu = array();
	public $defaultIcon;
	private $module;
	private $folder;
	private $plugins = array();
	private $PluginManger;

	public function accessRules() {
		return array(
			array('allow',
				'users' => array('@'),
			),
			array('deny',
				'users' => array('*'),
			),
		);
	}

	public function filters() {
		return array(
			'accessControl',
		);
	}

	public function init() {
		parent::init();
		$this->module = Yii::app()->getModule('plugin');
		$this->folder = Yii::getPathOfAlias($this->module->pluginRoot);
		$this->PluginManger = new PluginManger();
		$this->adminLayout = $this->module->layout;
		$this->defaultIcon = Yii::app()->getAssetManager()->publish($this->module->moduleDir . DIRECTORY_SEPARATOR . 'default.png');
	}

	public function actionIndex() {
		$this->_getPlugins($this->folder);
		$this->_loadPlugins();
		$this->_setMenu();
		$plugins = array(PluginManger::STATUS_Enabled => Array(), PluginManger::STATUS_Installed => array(), PluginManger::STATUS_NotInstalled => array());

		foreach ($this->plugins as $plugin) {
			switch ($this->PluginManger->Status($plugin['plugin'])) {
				case PluginManger::STATUS_Enabled:
					$plugins[PluginManger::STATUS_Enabled][] = $plugin;
					break;
				case PluginManger::STATUS_Installed:
					$plugins[PluginManger::STATUS_Installed][] = $plugin;
					break;
				case PluginManger::STATUS_NotInstalled:
					$plugins[PluginManger::STATUS_NotInstalled][] = $plugin;
					break;
			}
		}
		$this->render('index', array('plugins' => $plugins));
	}

	public function actionSetting($id) {
		$this->_setMenu();
		$plugin = $this->_loadPluginFromIdentify($id);
		if (method_exists($plugin, 'AdminCp')) {
			ob_start();
			$plugin->AdminCp();
			$content = ob_get_contents();
			ob_end_clean();
		} elseif ($plugin->setAdminCp()) {
			$file = $plugin->setAdminCp();
			include_once($plugin->pluginDir . DIRECTORY_SEPARATOR . $file . '.php');
			if (strpos($file, '/') !== FALSE) {
				$class = end(explode('/', $file));
			} else {
				$class = $file;
			}
			if (!class_exists($class)) {
				$this->redirect(array('plugin/PluginManage/index'));
				exit;
			}
			$AdminCp = new $class();
			$AdminCp->Owner($plugin);
			ob_start();
			$AdminCp->run();
			$content = ob_get_contents();
			ob_end_clean();
		} else {
			$this->redirect(array('plugin/PluginManage/index'));
			exit;
		}
		$this->render('setting', array('name' => $plugin->name, 'content' => $content));
	}

	public function actionMarket() {
		
	}

	public function actionInstall() {
		if (!isset($_POST['id']))
			$this->_ajax(0);
		$id = $_POST['id'];
		$plugin = $this->_loadPluginFromIdentify($id);
		$result = $this->PluginManger->Install($plugin);
		if ($result) {
			$this->_ajax(1);
		} else {
			$this->_ajax(0);
		}
	}

	public function actionUninstall() {
		if (!isset($_POST['id']))
			$this->_ajax(0);
		$id = $_POST['id'];
		$plugin = $this->_loadPluginFromIdentify($id);
		$result = $this->PluginManger->Uninstall($plugin);
		if ($result) {
			$this->_ajax(1);
		} else {
			$this->_ajax(0);
		}
	}

	public function actionEnable() {
		if (!isset($_POST['id']))
			$this->_ajax(0);
		$id = $_POST['id'];
		$plugin = $this->_loadPluginFromIdentify($id);
		if ($this->PluginManger->Enable($plugin)) {
			$this->_setMenu(TRUE);
			$this->_ajax(1);
		} else {
			$this->_ajax(0);
		}
	}

	public function actionDisable() {
		if (!isset($_POST['id']))
			$this->_ajax(0);
		$id = $_POST['id'];
		$plugin = $this->_loadPluginFromIdentify($id);
		if ($this->PluginManger->Disable($plugin)) {
			$this->_setMenu(TRUE);
			$this->_ajax(1);
		} else {
			$this->_ajax(0);
		}
	}
	private function _getPlugins($folder) {
		if ($handle = opendir($folder)) {
			while (FALSE !== ($file = readdir($handle))) {
				if ($file != "." && $file != "..") {
					if (is_dir($folder . DIRECTORY_SEPARATOR . $file)) {
						$this->_getPlugins($folder . DIRECTORY_SEPARATOR . $file);
					} else {
						if (preg_match('/^[\w_]+Plugin.php$/', $file))
							$this->plugins[] = array('path' => $folder, 'pluginEntry' => $file);
					}
				}
			}
			closedir($handle);
		} else {
			return FALSE;
		}
	}

	private function _loadPlugins() {
		$plugins = array();
		foreach ($this->plugins as $k => $plugin) {
			@include_once($plugin['path'] . DIRECTORY_SEPARATOR . $plugin['pluginEntry']);
			$class = substr($plugin['pluginEntry'], 0, strlen($plugin['pluginEntry']) - 4);
			if (class_exists($class)) {
				$this->plugins[$k]['plugin'] = new $class();
				$this->plugins[$k]['status'] = $this->PluginManger->Status($this->plugins[$k]['plugin']);
				$this->plugins[$k]['identify'] = $this->plugins[$k]['plugin']->identify;
				$plugins[$k] = $this->plugins[$k];
				unset($plugins[$k]['plugin']);
			}
		}
		Yii::app()->cache->set('PluginList', $plugins);
		return TRUE;
	}

	private function _loadPluginFromIdentify($identify) {
		$plugins = Yii::app()->cache->get('PluginList');
		if (!$plugins) {
			$this->_getPlugins($this->folder);
			$this->_loadPlugins();
			$plugins = $this->plugins;
		}
		foreach ($plugins as $plugin) {
			if ($plugin['identify'] == $identify) {
				@include_once($plugin['path'] . DIRECTORY_SEPARATOR . $plugin['pluginEntry']);
				$class = substr($plugin['pluginEntry'], 0, strlen($plugin['pluginEntry']) - 4);
				if (class_exists($class)) {
					return new $class();
				}
			}
		}
		return FALSE;
	}

	private function _setMenu($force = FALSE) {
		if (!$force)
			$cache = Yii::app()->cache->get('PluginMenu');
		if ($cache) {
			$this->menu = $cache;
			return;
		}
		$this->menu = array();
		if (empty($this->plugins)) {
			$this->_getPlugins($this->folder);
			$this->_loadPlugins();
		}
		foreach ($this->plugins as $plugin) {
			if ($this->PluginManger->Status($plugin['plugin']) != PluginManger::STATUS_Enabled) {
				continue;
			}
			if (!method_exists($plugin, 'AdminCp') && !$plugin['plugin']->setAdminCp()) {
				continue;
			}
			$this->menu[] = array('label' => $plugin['plugin']->name, 'url' => array('/plugin/PluginManage/setting', 'id' => $plugin['plugin']->identify));
		}
		Yii::app()->cache->set('PluginMenu', $this->menu);
	}

	private function _ajax($status, $data = NULL) {
		header('Content-type: application/json');
		echo json_encode(array('status' => $status, 'data' => $data));
		Yii::app()->end();
	}

}

?>
