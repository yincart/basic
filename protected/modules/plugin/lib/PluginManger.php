<?php

class PluginManger {

	protected $pluginCache;

	const STATUS_NotInstalled = 0;
	const STATUS_Installed = 1;
	const STATUS_Enabled = 2;

	public function Install($plugin) {
		if (!$this->AssertPlugin($plugin)) {
			return FALSE;
		}
		if (!$plugin->Install()) {
			return FALSE;
		}
		if (!$this->RegisterPlugin($plugin)) {
			return FALSE;
		}
		return TRUE;
	}

	public function Uninstall($plugin) {
		if (!$plugin->Uninstall()) {
			return FALSE;
		}
		if (!$this->UnregisterPlugin($plugin)) {
			return FALSE;
		}
		return TRUE;
	}

	public function Enable($plugin) {
		$pluginModel = $this->loadModel()->findByAttributes(array('identify' => $plugin->identify));
		if (!$pluginModel)
			return FALSE;
		$pluginModel->enable = 1;

		return $pluginModel->update(array('enable'));
	}

	public function Disable($plugin) {
		$pluginModel = $this->loadModel()->findByAttributes(array('identify' => $plugin->identify));
		if (!$pluginModel)
			return FALSE;
		$pluginModel->enable = 0;

		return $pluginModel->update(array('enable'));
	}

	public function Status($plugin) {
		$plugin = $this->loadModel()->findByAttributes(array('identify' => $plugin->identify));
		if (!$plugin) {
			return self::STATUS_NotInstalled;
		} elseif ($plugin->enable) {
			return self::STATUS_Enabled;
		} else {
			return self::STATUS_Installed;
		}
	}

	protected function RegisterPlugin($plugin) {
		$model = $this->loadModel();
		$model->identify = $plugin->identify;
		$model->path = $plugin->pluginDir;
		$model->hooks = serialize($plugin->Hooks());
		if (!$model->save()) {
			return FALSE;
		}
		return TRUE;
	}

	protected function UnregisterPlugin($plugin) {
		$model = $this->loadModel();
		$row = $model->deleteAllByAttributes(array('identify' => $plugin->identify));
		if ($row) {
			return TRUE;
		}
	}

	protected function AssertPlugin($plugin) {
		$hooks = $plugin->Hooks();
		$r1 = !empty($hooks);
		$r2 = $plugin->identify ? TRUE : FALSE;
		$r3 = !$this->Status($plugin);
		$r4 = !$this->loadModel()->findByAttributes(array('identify' => $plugin->identify));
		return $r1 && $r2 && $r3 && $r4;
	}

	protected function loadModel() {
		return new Plugins();
	}

}

?>
