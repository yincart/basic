<?php

abstract class Plugin extends PluginBase {

	private $info = array(
		'identify' => '',
		'version' => '',
		'copyright' => '',
		'website' => '',
		'description' => '',
		'name' => '',
	);

	abstract public function Hooks();

	public function Actions() {
		return FALSE;
	}

	public function setAdminCp() {
		return FALSE;
	}

	public function __get($name) {
		$value = parent::__get($name);
		if (!$value && isset($this->info[$name])) {
			return $this->info[$name];
		}
	}

	public function __set($name, $value) {
		$setter = 'set' . $name;
		if (method_exists($this, $setter)) {
			return $this->$setter($name, $value);
		} elseif (isset($this->info[$name])) {
			$this->info[$name] = $value;
		} else {
			return FALSE;
		}
	}

	public function Install() {
		return TRUE;
	}

	public function Uninstall() {
		return TRUE;
	}

	protected function query($sql, $prefix = 'tbl_') {
		$db = Yii::app()->db;
		$tablePrefix = $db->tablePrefix;
		if ($tablePrefix != $prefix)
			$sql = str_replace($Prefix, $tablePrefix, $sql);
		$transaction = $db->beginTransaction();
		try {
			$db->createCommand($sql)->execute();
			$transaction->commit();
		} catch (Exception $e) {
			$transaction->rollback();
			return FALSE;
		}
		return TRUE;
	}

	public function LoadHook($string) {
		$hk = explode('.', $string);
		if (!$hk[1])
			return FALSE;
		include_once($this->pluginDir . DIRECTORY_SEPARATOR . $hk[0] . DIRECTORY_SEPARATOR . $this->identify . $hk[1] . '.php');
		$class = $this->identify . $hk[1];
		if (!class_exists($class)) {
			return FALSE;
		}
		$hook = new $class();
		$hook->Owner($this);
		return $hook;
	}

}

